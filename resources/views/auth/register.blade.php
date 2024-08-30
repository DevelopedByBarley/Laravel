<x-layout>
    <x-slot:heading>
        Register user
    </x-slot:heading>

    <form method="POST" action="/register">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="first_name">First name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="first_name" id="first_name" autocomplete="first_name"
                                placeholder="Szaniszló" required />
                            <x-form-error name="first_name" />
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <x-form-label for="last_name">Last name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="last_name" id="last_name" autocomplete="last_name"
                                placeholder="Árpád" required />
                            <x-form-error name="last_name" />
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <x-form-label for="email">E-mail</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="email" id="email" autocomplete="email"
                                placeholder="asd@asd.com" required />
                            <x-form-error name="email" />
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" autocomplete="password"
                                placeholder="password" required />
                            <x-form-error name="password" />
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password_confirmation"
                                id="password_confirmation" autocomplete="password_confirmation"
                                placeholder="password_confirmation" required />
                            <x-form-error name="password_confirmation" />
                        </div>
                    </div>


                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/">Cancel</a>
            <x-form-button>
                Register
            </x-form-button>
        </div>
    </form>

</x-layout>
