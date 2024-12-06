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
const profilePicture = document.getElementById('profile-picture');
const profilePictureInput = document.getElementById('profile-picture-input');
const profileForm = document.getElementById('profile-form');
const deleteProfileButton = document.getElementById('delete-profile');


profilePictureInput.addEventListener('change', function () {
    const file = profilePictureInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            profilePicture.style.backgroundImage = `url(${e.target.result})`;
            profilePicture.innerHTML = '';
            localStorage.setItem('profilePicture', e.target.result);
        };
        reader.readAsDataURL(file);
    }
});


profileForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const profileData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        address: document.getElementById('address').value,
        phone: document.getElementById('phone').value,
    };

    localStorage.setItem('profileData', JSON.stringify(profileData));
    alert('Profil berhasil diperbarui!');
});


window.onload = function () {
    const savedProfileData = JSON.parse(localStorage.getItem('profileData'));
    if (savedProfileData) {
        document.getElementById('name').value = savedProfileData.name || '';
        document.getElementById('email').value = savedProfileData.email || '';
        document.getElementById('address').value = savedProfileData.address || '';
        document.getElementById('phone').value = savedProfileData.phone || '';
    }

    const savedProfilePicture = localStorage.getItem('profilePicture');
    if (savedProfilePicture) {
        profilePicture.style.backgroundImage = `url(${savedProfilePicture})`;
        profilePicture.innerHTML = '';
    }
};


deleteProfileButton.addEventListener('click', function () {
    if (confirm('Apakah Anda yakin ingin menghapus profil?')) {
        localStorage.removeItem('profileData');
        localStorage.removeItem('profilePicture');
        profileForm.reset();
        profilePicture.style.backgroundImage = '';
        profilePicture.innerHTML = '<i class="fa fa-user"></i>';
        alert('Profil berhasil dihapus!');
    }
});