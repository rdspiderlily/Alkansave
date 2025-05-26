document.addEventListener('DOMContentLoaded', () => {
    loadProfile();
});

async function loadProfile() {
    try {
        const response = await fetch('../2_Application/controllers/ProfileController.php?action=getProfile');
        const result = await response.json();

        if (result.success) {
            const data = result.data;

            document.getElementById('lastName').textContent = data.lastName || '';
            document.getElementById('firstName').textContent = data.firstName || '';
            document.getElementById('dateOfBirth').textContent = data.dateOfBirth || '';
            document.getElementById('username').textContent = data.username || '';
            document.getElementById('emailAddress').textContent = data.email || '';

            const profileImg = document.getElementById('profilePreview');
            if (data.profilePicture) {
                profileImg.src = `../1_Presentation/${data.profilePicture}`;
            } else {
                profileImg.src = 'images/profile.svg'; // fallback image
            }
            profileImg.alt = `${data.firstName || ''} ${data.lastName || ''}`.trim();

        } else {
            console.error('Failed to load profile:', result.error);
            setLoadingError();
        }
    } catch (error) {
        console.error('Error fetching profile:', error);
        setLoadingError();
    }
}

function setLoadingError() {
    const fields = ['lastName', 'firstName', 'dateOfBirth', 'username', 'emailAddress'];
    fields.forEach(id => {
        document.getElementById(id).textContent = 'N/A';
    });
    const profileImg = document.getElementById('profilePreview');
    profileImg.src = 'images/profile.svg';
    profileImg.alt = 'Profile Picture';
}
