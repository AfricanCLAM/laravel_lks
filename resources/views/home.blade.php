@extends('layouts.app')
@section('title', 'Home')

@section('content')

@if(Session::has('success'))
<!-- Modal backdrop -->
<div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
<!-- Modal -->
<div id="modal" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 lg:w-1/3 p-6">
        <!-- Modal header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold">Error</h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal body -->
        <div class="mb-4">
            <p>{{ Session::get('success') }}.</p>
        </div>

        <!-- Modal footer -->
        <div class="flex justify-end">
            <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Close
            </button>
        </div>
    </div>
</div>

<script>
    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.getElementById('modalBackdrop').classList.add('hidden');
    }

    // Close modal when clicking outside of it
    document.getElementById('modalBackdrop').addEventListener('click', closeModal);
</script>
@endif
@endsection