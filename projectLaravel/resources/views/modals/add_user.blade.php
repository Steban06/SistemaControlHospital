<style>
    .btn-color-red:hover {
        border-color: #dc2626 !important; /* rojo (tailwind red-600) */
        color: #dc2626 !important;
        background-color: transparent !important;
    }
</style>

<!-- Add User Modal -->
<div id="addUserModal" class="fixed inset-0 z-[99999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 99999;">
    <!-- Overlay Background -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[99998]" data-modal-cancel style="z-index: 99998; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <!-- Modal Container -->
    <div role="dialog" id="radix-:add-user-modal:"
        class="bg-white fixed top-[50%] left-[50%] z-[100000] flex flex-col translate-x-[-50%] translate-y-[-50%] rounded-xl border shadow-2xl duration-200 sm:max-w-6xl w-[95vw] max-h-[90vh]"
        tabindex="-1" style="pointer-events: auto; z-index: 100000;" onclick="event.stopPropagation()">

        <!-- Close Button (X) -->
        <button title="Cerrar modal" data-modal-close type="button" class="btn-color-red cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-all hover:opacity-100 hover:text-red-600 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none p-1 modal-close_btn z-50">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Close</span>
        </button>

        <!-- HEADER -->
        <div class="flex-shrink-0 px-6 pt-6 pb-4 border-b border-gray-200">
            <div class="flex flex-col gap-1 text-center sm:text-left">
                <h2 class="font-bold text-xl text-gray-900 pr-8">Agregar Nuevo Usuario</h2>
                <p class="text-sm text-gray-500">Complete la información del usuario</p>
            </div>
        </div>

        <!-- BODY -->
        <div class="flex-1 overflow-y-auto px-6 py-4">
            <form id="formAddUser" method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="name">Nombre Completo</label>
                        <input name="name" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="name" placeholder="Ej: María González" required>
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="email">Email</label>
                        <input type="email" name="email" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="email" placeholder="usuario@hospital.com" required>
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="password">Contraseña</label>
                        <input type="password" name="password" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="password" placeholder="********" required minlength="8">
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50" for="role">Rol</label>
                         <select id="role" name="role" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex w-full items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 text-sm whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 aspect-none appearance-none">
                            <option value="user">Usuario</option>
                            <option value="admin">Administrador</option>
                            <option value="guest">Invitado</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-6">
                    <button type="button" data-modal-close class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-600 bg-white text-gray-700 hover:bg-gray-100 hover:text-gray-900 h-9 px-4 py-2 btn-color-red">Cancelar</button>
                    <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white hover:bg-blue-700 h-9 px-4 py-2">Agregar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>
