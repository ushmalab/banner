document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.close-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const flashContainer = this.closest('.flash-message-container');
            const flashId = flashContainer ? flashContainer.getAttribute('id') : null;
            const showAgainIcon = flashId ? document.querySelector(`[data-flash-id="${flashId}"]`) : null;
            
            if (flashContainer) {
                // Set transition first
                flashContainer.style.transition = 'all 0.3s ease-out';
                
                // Determine position and apply appropriate animation
                const isTopPosition = flashContainer.classList.contains('flash-position-top');
                const isBottomPosition = flashContainer.classList.contains('flash-position-bottom');
                
                if (isTopPosition) {
                    // Slide up and fade out for top positioned messages
                    flashContainer.style.transform = 'translateY(-100%)';
                } else if (isBottomPosition) {
                    // Slide down and fade out for bottom positioned messages
                    flashContainer.style.transform = 'translateY(100%)';
                } else {
                    // Default: slide left and up
                    flashContainer.style.transform = 'translateY(-100%) translateX(-100%)';
                }
                
                flashContainer.style.opacity = '0';
                
                setTimeout(() => {
                    flashContainer.style.display = 'none';
                    
                    // Show the "show again" icon if it exists
                    if (showAgainIcon) {
                        showAgainIcon.classList.add('visible');
                    }
                }, 300);
            }
        });
    });

    // Handle show again functionality
    document.querySelectorAll('.show-again-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            const flashId = this.getAttribute('data-flash-id');
            const flashContainer = flashId ? document.getElementById(flashId) : null;
            
            if (flashContainer) {
                // Reset styles and show the flash message
                flashContainer.style.display = 'block';
                
                // Force a reflow to ensure display change is applied
                flashContainer.offsetHeight;
                
                // Set transition for smooth entrance
                flashContainer.style.transition = 'all 0.3s ease-in';
                
                // Reset transform and opacity to bring it back
                flashContainer.style.transform = 'translateY(0) translateX(0)';
                flashContainer.style.opacity = '1';
                
                // Hide the show again icon
                this.classList.remove('visible');
            }
        });
    });
});