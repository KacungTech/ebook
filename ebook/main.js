let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
    // Cegah browser untuk menampilkan prompt default
    e.preventDefault();

    // Simpan event untuk digunakan nanti
    deferredPrompt = e;

    // Tampilkan tombol Install jika ada
    const installButton = document.getElementById('install-btn');
    if (installButton) {
        installButton.style.display = 'block';

        // Tambahkan event listener untuk tombol
        installButton.addEventListener('click', async () => {
            // Tampilkan prompt
            deferredPrompt.prompt();

            // Tunggu keputusan pengguna
            const choiceResult = await deferredPrompt.userChoice;
            console.log('User choice:', choiceResult.outcome);

            // Reset deferredPrompt
            deferredPrompt = null;
        });
    }
});
