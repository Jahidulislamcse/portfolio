@extends('admin.layout.admin-master')
@section('title', 'Dashboard')

@section('main')
<main class="flex-1 p-8">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-4xl font-bold text-[var(--text-primary)]">Dashboard</h2>
    </div>
    <section class="mb-8">
        <h3 class="text-2xl font-semibold text-[var(--text-primary)] mb-4">System Overview</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
                <p class="text-[var(--text-secondary)] text-base font-medium mb-2">Total Products</p>
                <p class="text-[var(--text-primary)] text-3xl font-bold">{{$productCount}}</p>
            </div>
            <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
                <p class="text-[var(--text-secondary)] text-base font-medium mb-2">Unread Messages</p>
                <p class="text-[var(--text-primary)] text-3xl font-bold">{{$messageCount}}</p>
            </div>
            <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
                <p class="text-[var(--text-secondary)] text-base font-medium mb-2">Total Brands</p>
                <p class="text-[var(--text-primary)] text-3xl font-bold">{{$brandCount}}</p>
            </div>
        </div>
    </section>
    <section class="mb-8">
        <h3 class="text-2xl font-semibold text-[var(--text-primary)] mb-4">Messages</h3>
        <div class="overflow-x-auto bg-white rounded-md border border-gray-200 shadow-sm">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-[var(--text-primary)] text-sm font-semibold uppercase">Name</th>
                        <th class="px-6 py-4 text-[var(--text-primary)] text-sm font-semibold uppercase">Email</th>
                        <th class="px-6 py-4 text-[var(--text-primary)] text-sm font-semibold uppercase">Message</th>
                        <th class="px-6 py-4 text-[var(--text-primary)] text-sm font-semibold uppercase">Received At</th>
                        <th class="px-6 py-4 text-[var(--text-primary)] text-sm font-semibold uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($messages as $message)
                    <tr>
                        <td class="px-6 py-4 text-[var(--text-primary)] font-medium">{{ $message->name }}</td>
                        <td class="px-6 py-4 text-[var(--text-secondary)]">{{ $message->email }}</td>
                        <td class="px-6 py-4 text-[var(--text-secondary)]">
                            <div>
                                @if(strlen($message->message) > 50)
                                <span class="short-message">{{ Str::limit($message->message, 50) }}</span>
                                <span class="full-message hidden">{{ $message->message }}</span>
                                <button type="button" class="toggle-message text-blue-600 underline ml-2">
                                    Read more
                                </button>
                                @else
                                {{ $message->message }}
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-[var(--text-secondary)]">{{ $message->created_at->format('Y-m-d H:i A') }}</td>
                        <td class="px-6 py-4">
                            @if($message->status === 'unread')
                            <form action="{{ route('messages.markRead', $message->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                    Mark as Read
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    </section>

</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.toggle-message').forEach(button => {
            button.addEventListener('click', () => {
                const shortMsg = button.previousElementSibling.previousElementSibling;
                const fullMsg = button.previousElementSibling;

                if (fullMsg.classList.contains('hidden')) {
                    shortMsg.classList.add('hidden');
                    fullMsg.classList.remove('hidden');
                    button.textContent = "Show less";
                } else {
                    shortMsg.classList.remove('hidden');
                    fullMsg.classList.add('hidden');
                    button.textContent = "Read more";
                }
            });
        });
    });
</script>

<link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
<link as="style"
    href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B600%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    onload="this.rel='stylesheet'" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<meta charset="utf-8" />
<link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<style type="text/tailwindcss">
    :root {
    --primary-color: #1193d4;
    --secondary-color: #f0f3f4;
    --text-primary: #111618;
    --text-secondary: #617c89;
    }
</style>
@endsection