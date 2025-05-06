<div class="bg-gray-100 text-gray-800">
    {{-- Include Navbar Component --}}
    @livewire('navbar')

    {{-- Include Login Modal --}}
    @livewire('auth.login')

    {{-- Include register Modal --}}
    @livewire('auth.register')

    <div class="max-w-6xl mx-auto px-4 py-12 pt-24 font-ibm">
        <!-- Tentang Website -->
        <div class="grid md:grid-cols-2 gap-8 mb-24 items-center">
            <div class="scroll-left">
                <h2 class="text-2xl font-bold mb-4">Tentang Website</h2>
                <p class="mb-4">
                    Selamat datang di platform kami, tempat di mana Anda dapat menemukan berbagai bahan baku, berkualitas dan produk unggulan dari pelaku UMKM lokal.
                    Website ini hadir sebagai solusi untuk memudahkan konsumen dalam menemukan produk lokal terpercaya...
                </p>
                <p>
                    Kami percaya bahwa kekuatan ekonomi Indonesia dimulai dari UMKM yang tangguh dan berkualitas...
                </p>
            </div>
            <div class="flex justify-center scroll-right">
                <img src="{{ asset('images/img2.png') }}" alt="Tentang Website" class="w-52">
            </div>
        </div>

        <!-- Tertarik Bekerja Sama? -->
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div class="flex justify-center scroll-left">
                <img src="{{ asset('images/img2.png') }}" alt="Kerja Sama" class="w-52">
            </div>
            <div class="scroll-right">
                <h2 class="text-2xl font-bold mb-4">Tertarik Bekerja Sama?</h2>
                <p class="mb-2">
                    Kami membuka kesempatan seluas-luasnya bagi Anda yang memiliki bahan baku atau produk UMKM untuk bergabung bersama kami...
                </p>
                <ul class="list-disc list-inside mb-4">
                    <li>Email: email@example.com</li>
                    <li>WhatsApp: 08xxxxxxxxxx</li>
                    <li>Formulir Kerja Sama: <a href="#" class="text-blue-500 underline">[Link ke halaman form]</a></li>
                </ul>
                <p>
                    Bersama, kita bisa menciptakan jaringan usaha lokal yang lebih kuat dan berdampak!
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#3B2F1E] text-white mt-12">
        <div class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-4 gap-8 text-sm">
            <div>
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/img2.png') }}" alt="Logo" class="w-18">
                    <span class="font-rubix text-2xl">FILA</span>
                </div>
            </div>
            <div class="font-ibm">
                <h3 class="font-semibold mb-2 text-lg">Product</h3>
                <ul class="space-y-2">
                    <li>Feature</li>
                    <li>Pricing</li>
                    <li>Recommendation</li>
                </ul>
            </div>
            <div class="font-ibm">
                <h3 class="font-semibold mb-2 text-lg">Company</h3>
                <ul class="space-y-2">
                    <li>About Us</li>
                    <li>Contact Us</li>
                    <li>FAQs</li>
                </ul>
            </div>
            <div class="font-ibm">
                <h3 class="font-semibold mb-2 text-lg">Follow Us</h3>
                <ul class="space-y-2">
                    <li>Instagram</li>
                    <li>Contact Us</li>
                    <li>FAQs</li>
                </ul>
            </div>
        </div>
        <div class="text-center text-xs text-gray-400 border-t font-ibm border-gray-700 py-4">
            © 2022 Brand, Inc.
        </div>
    </footer>
</div>
