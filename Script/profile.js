function checkLoginStatus() {
    const isLoggedIn = localStorage.getItem('loggedIn') === 'true'; // Mengecek status login di LocalStorage
    if (isLoggedIn) {
        // Jika pengguna sudah login, arahkan ke halaman profile
        window.location.href = 'profile.html';
    } else {
        // Jika belum login, arahkan ke halaman login
        alert('Anda harus login terlebih dahulu!');
        window.location.href = 'login.html';
    }
}
