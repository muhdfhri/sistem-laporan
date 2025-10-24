<div class="space-y-6">
    <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="fas fa-exclamation-triangle text-red-400"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm text-red-700">
                    Setelah akun Anda dihapus, semua data yang terkait dengan akun tersebut akan dihapus secara permanen. 
                    Tindakan ini tidak dapat dibatalkan.
                </p>
            </div>
        </div>
    </div>

    <button type="button" 
            onclick="showDeleteModal()"
            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <i class="fas fa-trash-alt mr-2"></i> Hapus Akun
    </button>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteAccountModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg p-6 max-w-md w-full">
        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
            <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
        </div>
        <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Konfirmasi Hapus Akun</h3>
        <p class="text-sm text-gray-600 text-center mb-6">
            Apakah Anda yakin ingin menghapus akun Anda? Tindakan ini tidak dapat dibatalkan dan semua data Anda akan dihapus secara permanen.
        </p>
        
        <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
            @csrf
            @method('delete')
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Masukkan Password Anda</label>
                <input type="password" 
                       name="password" 
                       id="password" 
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500"
                       placeholder="Ketik password Anda">
                @if ($errors->userDeletion->has('password'))
                    <p class="mt-1 text-sm text-red-600">{{ $errors->userDeletion->first('password') }}</p>
                @endif
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" 
                        onclick="hideDeleteModal()"
                        class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Batal
                </button>
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Ya, Hapus Akun
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function showDeleteModal() {
    document.getElementById('deleteAccountModal').classList.remove('hidden');
    document.getElementById('deleteAccountModal').classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function hideDeleteModal() {
    document.getElementById('deleteAccountModal').classList.add('hidden');
    document.getElementById('deleteAccountModal').classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('deleteAccountModal');
    if (event.target === modal) {
        hideDeleteModal();
    }
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        hideDeleteModal();
    }
});
</script>

<style>
.overflow-hidden {
    overflow: hidden;
}
</style>
