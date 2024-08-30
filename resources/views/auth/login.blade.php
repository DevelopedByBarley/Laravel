<x-layout>
    <x-slot:heading>
        Login User
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">

                        <x-form-label for="email">E-mail</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="email" id="email" autocomplete="email"
                                placeholder="asd@asd.com" :value="old('email')" required />
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



                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/">Cancel</a>
            <x-form-button>
                Login
            </x-form-button>
        </div>
    </form>

</x-layout>
