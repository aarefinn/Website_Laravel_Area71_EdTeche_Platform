use Illuminate\Support\Facades\Auth;

public function buyCourse($id)
{
    if (!Auth::check()) {
        return redirect()->route('login.form')->with('error', 'Please login to buy a course.');
    }

    $user = Auth::user();
    $course = Course::findOrFail($id);

    // Check if already purchased
    $existing = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->where('orders.user_id', $user->id)
        ->where('order_details.course_id', $course->id)
        ->exists();

    if ($existing) {
        return redirect()->route('user')->with('success', 'You already own this course.');
    }

    // Create order
    $orderId = DB::table('orders')->insertGetId([
        'user_id' => $user->id,
        'status' => 'delivered',
        'total_amount' => $course->price,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    DB::table('order_details')->insert([
        'order_id' => $orderId,
        'course_id' => $course->id,
        'price' => $course->price,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->route('user')->with('success', 'Course purchased successfully!');
}
