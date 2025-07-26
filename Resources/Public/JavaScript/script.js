document.querySelectorAll('.close-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const flashContainer = this.closest('.flash-message-container');
        
        if (flashContainer) {
            flashContainer.style.transform = 'translateY(-100%)';
            flashContainer.style.transform = 'translateX(-100%)';
            flashContainer.style.opacity = '0';
            flashContainer.style.transition = 'all 0.3s ease-out';
            
            setTimeout(() => {
                flashContainer.remove(); 
            }, 300);
        }
    });
});