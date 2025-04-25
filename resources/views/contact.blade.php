@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Form Suggestions -->
        <div>
            <h2 class="text-xl font-semibold mb-4">SUGGESTIONS</h2>
            <form action="#" method="POST" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="NAME..." class="border px-4 py-2 w-full">
                    <input type="email" placeholder="EMAIL..." class="border px-4 py-2 w-full">
                </div>
                <textarea placeholder="COMMENT..." class="border px-4 py-2 w-full h-32 resize-none"></textarea>
                <div class="text-right">
                    <button type="submit" class="bg-[#F7931E] text-white px-6 py-2">SEND</button>
                </div>
            </form>

            <!-- Contact Info -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-2">CONTACT US</h2>
                <input type="text" value="+62 82389519698" class="border px-4 py-2 w-full" readonly>
            </div>
        </div>

        <!-- Chat Bot -->
        <div>
            <h2 class="text-xl font-semibold mb-4">CHAT BOT(Soon)</h2>
            <div class="border h-64 w-full"></div>
        </div>
    </div>
</div>
@endsection
