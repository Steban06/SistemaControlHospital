<style>
    .btn-color-red:hover {
        border-color: #dc2626 !important; /* rojo (tailwind red-600) */
        color: #dc2626 !important;
        background-color: transparent !important;
    }
</style>

<!-- Edit User Role/Status Modal -->
<div id="editUserModal" class="fixed inset-0 z-[99999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 99999;">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[99998]" data-edit-modal-cancel style="z-index: 99998; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <!-- Modal Content -->
    <div role="dialog" 
         class="bg-white dark:bg-gray-800 fixed top-[50%] left-[50%] z-[100000] flex flex-col translate-x-[-50%] translate-y-[-50%] rounded-xl border border-gray-200 dark:border-gray-700 shadow-2xl duration-200 sm:max-w-lg w-[95vw]"
         tabindex="-1" style="pointer-events: auto; z-index: 100000;" onclick="event.stopPropagation()">

        <!-- Header -->
        <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 px-6 py-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100" id="modal-title">
                Editar Usuario
            </h3>
            <button title="Cerrar modal" data-edit-modal-close type="button" class="btn-color-red cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-all hover:opacity-100 hover:text-red-600 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none p-1 modal-close_btn z-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!-- Body -->
        <div class="px-6 py-4">
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                Estás editando la información de <span class="font-bold text-gray-800 dark:text-gray-200" id="editUserNameSpan"></span>.
            </p>
            
            <form id="editUserForm" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" id="editUserId" name="id">
                
                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="editUserName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre</label>
                        <input type="text" id="editUserName" name="name" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-3 py-2" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="editUserEmail" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Correo Electrónico</label>
                        <input type="email" id="editUserEmail" name="email" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-3 py-2" required>
                    </div>

                    <!-- Password (Optional) -->
                    <div id="password-field-container">
                        <label for="editUserPassword" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nueva Contraseña (Opcional)</label>
                        <input type="password" id="editUserPassword" name="password" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-3 py-2" placeholder="Dejar en blanco para mantener la actual" minlength="8">
                    </div>

                    <!-- Role Selection -->
                    <div>
                        <label for="editUserRole" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Rol del Usuario</label>
                        <select id="editUserRole" name="role" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-3 py-2">
                            <option value="admin">Administrador</option>
                            <option value="user">Usuario</option>
                            <option value="guest">Invitado</option>
                        </select>
                    </div>

                    <!-- Status Selection -->
                    <div>
                        <label for="editUserStatus" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado</label>
                        <select id="editUserStatus" name="status" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-3 py-2">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
                
                <!-- Footer inside form -->
                <div class="bg-gray-50 rounded-lg dark:bg-gray-700/30 px-6 py-4 flex flex-row-reverse gap-3 border-t border-gray-100 dark:border-gray-700 rounded-b-xl">
                    <button type="submit" 
                            id="btn-save-edit-user"
                            class="inline-flex w-full justify-center rounded-lg bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:w-auto transition-colors">
                        Guardar Cambios
                    </button>
                    <button type="button" 
                            data-edit-modal-close
                            class="inline-flex w-full justify-center rounded-lg bg-white dark:bg-gray-800 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 sm:w-auto transition-colors btn-color-red">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
