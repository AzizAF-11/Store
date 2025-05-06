<div x-data="{ open: false }" x-show="open" @open-login-modal.window="open = true"
    @close-login-modal.window="open = false" x-transition style="display: none;">

    <!-- Modal Wrapper -->
    <div class="fixed inset-0 z-50 flex items-center justify-center">
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-black opacity-70" @click="open = false"></div>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg overflow-hidden w-full max-w-5xl max-h-full flex shadow-lg relative z-10">
            <!-- Image Side -->
            <div class="w-1/2 hidden md:block">
                <img src="{{ asset('images/img1.jpg') }}" alt="Login Image"
                    class="object-cover w-[500px] h-[600px] max-w-none">
            </div>

            <!-- Form Side -->
            <div class="w-full md:w-1/2 p-8 relative font-ibm">
                <button @click="open = false"
                    class="absolute top-4 right-4 text-gray-400 hover:text-black text-2xl font-bold">×</button>

                <div class="flex flex-col items-center mb-6">
                    <img src="{{asset('images/img2.png')}}" alt="Sleeknote Logo" class="h-8 mb-3" />
                    <h2 class="text-3xl font-bold text-gray-900">Welcome Back</h2>
                </div>

                <button
                    class="w-full flex box-press items-center justify-center border border-gray-300 rounded-md py-2 mb-4 cursor-pointer hover:bg-gray-100 hover:inset-shadow-sm hover:inset-shadow-gray-500/40 ">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg"
                        class="h-5 w-5 mr-2" alt="Google" />
                    Log in with Google
                </button>

                <div class="flex items-center my-4">
                    <hr class="flex-grow border-gray-300">
                    <span class="mx-4 text-gray-400 text-xs">OR LOGIN WITH EMAIL</span>
                    <hr class="flex-grow border-gray-300">
                </div>

                <form wire:submit.prevent="login" class="space-y-4">
                    <div>
                        <label for="email" class="text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email" wire:model.defer="email" placeholder="Email Address"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-[#3B2F1E]-500">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" wire:model.defer="password" placeholder="Password"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-[#3B2F1E]-500">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center text-sm">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox text-blue-600">
                            <span>Keep me logged in</span>
                        </label>
                        <a href="#" class="text-pink-500 hover:underline">Forgot your password?</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#3B2F1E] hover:bg-[#2E2417] text-white rounded-md py-2 font-semibold box-press">
                        Log in
                    </button>

                </form>

                <p class="text-sm text-center text-gray-500 mt-6">
                    Don’t have an account? <a href="#" class="text-pink-500 hover:underline">Sign up</a>
                </p>
            </div>

        </div>
    </div>
</div>