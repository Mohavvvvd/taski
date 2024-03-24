document.addEventListener('DOMContentLoaded', () => {
    fetchUserInfo();
  });

  function fetchUserInfo() {
    fetch('get_user_info.php')
      .then(response => response.json())
      .then(data => {
        displayUserInfo(data);
      })
      .catch(error => console.error('Error fetching user info:', error));
  }

  function displayUserInfo(userInfo) {
    const divi =document.createElement('div');
    const userInfoDiv = document.getElementById('user-info');
    const username = document.createElement('p');
    username.textContent = 'Username: ' + userInfo.username;
    divi.appendChild(username);
    const email = document.createElement('p');
    email.textContent = 'Email: ' + userInfo.email;
    divi.appendChild(email);
    userInfoDiv.appendChild(divi);
  }