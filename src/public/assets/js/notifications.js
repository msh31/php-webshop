document.addEventListener('DOMContentLoaded', function() {
    const notificationContainer = document.getElementById('alertPlaceholder');
    if (!notificationContainer) return;

    const notifications = document.querySelectorAll('.notification');

    function createNotification(message, type) {
        const notificationElement = document.createElement('div');
        notificationElement.className = `notification ${type === 'error' ? 'notification-error' : 'notification-success'}`;
        notificationElement.setAttribute('role', 'alert');
        notificationElement.textContent = message;

        notificationElement.style.position = 'relative';

        const closeButton = document.createElement('span');
        closeButton.innerHTML = '&times;';
        closeButton.style.position = 'absolute';
        closeButton.style.right = '10px';
        closeButton.style.top = '5px';
        closeButton.style.cursor = 'pointer';
        closeButton.style.fontSize = '18px';
        closeButton.onclick = function() {
            hideNotification(notificationElement);
        };

        notificationElement.appendChild(closeButton);
        notificationContainer.appendChild(notificationElement);

        setTimeout(() => {
            notificationElement.classList.add('show');

            setTimeout(() => {
                hideNotification(notificationElement);
            }, 5000);
        }, 100);
    }

    function hideNotification(notification) {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.remove();
        }, 500);
    }

    notifications.forEach((notification) => {
        setTimeout(() => {
            notification.classList.add('show');

            setTimeout(() => {
                hideNotification(notification);
            }, 5000);
        }, 100);

        notification.addEventListener('click', function() {
            hideNotification(this);
        });
    });

    window.showNotification = createNotification;
});