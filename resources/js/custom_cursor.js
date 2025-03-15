export default class LightCursor {
    constructor(options = {}) {
        this.options = {
            size: options.size || 15,
            color: options.color || '#000000',
            zIndex: options.zIndex || 9999,
            removeDefault: options.removeDefault || false,
            trailCount: options.trailCount || 5,
            ...options
        };
        
        this.cursor = null;
        this.trails = [];
        this.mouseX = 0;
        this.mouseY = 0;
        this.targetX = 0;
        this.targetY = 0;
        this.isVisible = true;
        this.frame = 0;
        this.defaultColor = this.options.color;
        this.isHoveringSpecialElement = false;
        
        this.init();
    }
    
    init() {
        // Create main cursor
        this.cursor = document.createElement('div');
        this.cursor.classList.add('light-cursor');
        
        // Style cursor
        this.cursor.style.width = `${this.options.size}px`;
        this.cursor.style.height = `${this.options.size}px`;
        this.cursor.style.border = `2.5px solid ${this.options.color}`;
        this.cursor.style.borderRadius = '50%';
        this.cursor.style.position = 'fixed';
        this.cursor.style.pointerEvents = 'none';
        this.cursor.style.zIndex = this.options.zIndex;
        this.cursor.style.transform = 'translate(-50%, -50%)';
        // No transition - we'll handle movement with animation
        
        // Create multiple trail elements for a fun effect
        for (let i = 0; i < this.options.trailCount; i++) {
            const trail = document.createElement('div');
            trail.classList.add('light-cursor-trail');
            trail.style.width = `${this.options.size * (0.8 - i * 0.1)}px`;
            trail.style.height = `${this.options.size * (0.8 - i * 0.1)}px`;
            trail.style.backgroundColor = 'transparent';
            trail.style.border = `1.5px solid ${this.options.color}`;
            trail.style.opacity = 0.7 - (i * 0.1);
            trail.style.borderRadius = '50%';
            trail.style.position = 'fixed';
            trail.style.pointerEvents = 'none';
            trail.style.zIndex = this.options.zIndex - 1;
            trail.style.transform = 'translate(-50%, -50%)';
            
            document.body.appendChild(trail);
            this.trails.push({
                element: trail,
                x: 0,
                y: 0,
                delay: i * 2  // Each trail follows with a delay
            });
        }
        
        // Add to DOM
        document.body.appendChild(this.cursor);
        
        // Remove default cursor if needed
        if (this.options.removeDefault) {
            document.body.style.cursor = 'none';
            
            // Add to all clickable elements
            const clickables = document.querySelectorAll('a, button, input, textarea, select');
            clickables.forEach(el => {
                el.style.cursor = 'none';
            });
        }
        
        // Add event listeners with performance optimizations
        this.addEventListeners();
        
        // Start animation loop
        this.animate();
    }
    
    addEventListeners() {
        // Use passive event listeners for performance
        document.addEventListener('mousemove', this.onMouseMove.bind(this), { passive: true });
        document.addEventListener('mousedown', this.onMouseDown.bind(this), { passive: true });
        document.addEventListener('mouseup', this.onMouseUp.bind(this), { passive: true });
        document.addEventListener('mouseleave', () => { 
            this.isVisible = false;
            this.cursor.style.opacity = '0';
            this.trails.forEach(trail => {
                trail.element.style.opacity = '0';
            });
        }, { passive: true });
        document.addEventListener('mouseenter', () => { 
            this.isVisible = true;
            this.cursor.style.opacity = '1';
            this.trails.forEach((trail, i) => {
                trail.element.style.opacity = 0.7 - (i * 0.1);
            });
        }, { passive: true });
        
        // Handle link hovers
        const links = document.querySelectorAll('a, button, input[type="submit"], input[type="button"]');
        links.forEach(link => {
            link.addEventListener('mouseenter', this.onLinkHover.bind(this), { passive: true });
            link.addEventListener('mouseleave', this.onLinkLeave.bind(this), { passive: true });
        });
        
        // Add event listener for mousemove to check for elements with color #1a579f
        document.addEventListener('mousemove', this.checkElementColor.bind(this), { passive: true });
    }


    
    // Function to check if element under cursor has the specific color
    checkElementColor(e) {
        // Get element under the cursor
        const element = document.elementFromPoint(e.clientX, e.clientY);

        const textElements = [
            'P', 'SPAN'
          ];

        if (element) {
            // Get computed style
            const computedStyle = window.getComputedStyle(element);
            
            // Check for background color, color, or border color match
            const bgColor = this.rgbToHex(computedStyle.backgroundColor);
            const textColor = this.rgbToHex(computedStyle.color);
            const borderColor = this.rgbToHex(computedStyle.borderColor);
            
            if (bgColor === '#1a579f' || bgColor === '#9b1c1c' || bgColor === '#494c50' || bgColor === '#9f1a1a' || textColor === '#1a579f' || borderColor === '#1a579f' || 
                element.getAttribute('cursor-data-color') === '#1a579f' || element.getAttribute('cursor-data-color') === '#1A579F' ||
                element.style.color === '#1a579f' || 
                element.style.backgroundColor === '#1a579f') {
                
                // Element has the target color, change cursor to white
                if (!this.isHoveringSpecialElement) {
                    this.isHoveringSpecialElement = true;
                    this.changeCursorColor('#ffffff');
                }
            }else if (this.hasQlEditorAncestor(element) || element.tagName === 'INPUT' || element.tagName === 'TEXTAREA' || element.tagName === 'SELECT' || textElements.includes(element.tagName)){
                this.isHoveringSpecialElement = true;
                this.changeCursorColor('#1a579f40');
            }
             else if (this.isHoveringSpecialElement) {
                // No longer over the special element, revert to default color
                this.isHoveringSpecialElement = false;
                this.changeCursorColor(this.defaultColor);
            }
        }
    }
    
    // Helper function to convert RGB to hex
    rgbToHex(rgb) {
        // Check if the rgb value is in the format "rgb(r, g, b)"
        if (!rgb || rgb === 'transparent' || rgb === 'rgba(0, 0, 0, 0)') return null;
        
        const rgbMatch = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        if (rgbMatch) {
            const r = parseInt(rgbMatch[1]);
            const g = parseInt(rgbMatch[2]);
            const b = parseInt(rgbMatch[3]);
            
            return '#' + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1).toLowerCase();
        }
        return null;
    }


    // Checking If the element is Text Editor
    hasQlEditorAncestor(element) {
        while (element) {
          if (element.classList && element.classList.contains('ql-editor')) {
            return true; // Found an ancestor with the class 'ql-editor'
          }
          if (element.classList && element.classList.contains('ql-toolbar')) {
            return true; // Found an ancestor with the class 'ql-editor'
          }
          element = element.parentElement; // Move up to the parent element
        }
        return false; // No ancestor with the class 'ql-editor' found
      }

    
    // Function to change cursor color
    changeCursorColor(newColor) {
        this.cursor.style.border = `2.5px solid ${newColor}`;
        this.trails.forEach(trail => {
            trail.element.style.border = `1.5px solid ${newColor}`;
        });
    }
    
    onMouseMove(e) {
        this.targetX = e.clientX;
        this.targetY = e.clientY;
    }
    
    onMouseDown() {
        this.cursor.style.transform = 'translate(-50%, -50%) scale(0.8)';
        this.trails.forEach(trail => {
            trail.element.style.transform = 'translate(-50%, -50%) scale(0.6)';
        });
    }
    
    onMouseUp() {
        this.cursor.style.transform = 'translate(-50%, -50%) scale(1)';
        this.trails.forEach(trail => {
            trail.element.style.transform = 'translate(-50%, -50%) scale(1)';
        });
    }
    
    onLinkHover() {
        // Only change the scaling - color will be handled by checkElementColor
        this.cursor.style.transform = 'translate(-50%, -50%) scale(1.5)';
        this.cursor.style.backgroundColor = 'rgba(0,0,0,0.1)';
        
        this.trails.forEach(trail => {
            trail.element.style.backgroundColor = 'rgba(0,0,0,0.05)';
            trail.element.style.transform = 'translate(-50%, -50%) scale(1.2)';
        });
    }
    
    onLinkLeave() {
        this.cursor.style.transform = 'translate(-50%, -50%) scale(1)';
        this.cursor.style.backgroundColor = 'transparent';
        
        this.trails.forEach(trail => {
            trail.element.style.backgroundColor = 'transparent';
            trail.element.style.transform = 'translate(-50%, -50%) scale(1)';
        });
        
        // Make sure we have the correct color after leaving the link
        if (this.isHoveringSpecialElement) {
            this.changeCursorColor('#ffffff');
        } else {
            this.changeCursorColor(this.defaultColor);
        }
    }
    
    animate() {
        // Calculate cursor movement with smooth easing
        const ease = 0.15; // Lower = smoother/slower (0.05 to 0.2 is good range)
        
        // Update main cursor position with easing
        this.mouseX += (this.targetX - this.mouseX) * ease;
        this.mouseY += (this.targetY - this.mouseY) * ease;
        
        // Apply position to main cursor
        this.cursor.style.left = `${this.mouseX}px`;
        this.cursor.style.top = `${this.mouseY}px`;
        
        // Update trails with staggered delay
        this.trails.forEach((trail, index) => {
            // Each trail follows the previous one with delay
            if (index === 0) {
                trail.x += (this.mouseX - trail.x) * (ease - 0.05);
                trail.y += (this.mouseY - trail.y) * (ease - 0.05);
            } else {
                const prevTrail = this.trails[index - 1];
                trail.x += (prevTrail.x - trail.x) * (ease - 0.02);
                trail.y += (prevTrail.y - trail.y) * (ease - 0.02);
            }
            
            trail.element.style.left = `${trail.x}px`;
            trail.element.style.top = `${trail.y}px`;
        });
        
        // Add slight rotation or animation based on movement speed
        const dx = this.targetX - this.mouseX;
        const dy = this.targetY - this.mouseY;
        const speed = Math.sqrt(dx * dx + dy * dy);
        
        if (speed > 1) {
            const angle = Math.atan2(dy, dx) * (180 / Math.PI);
            this.cursor.style.transform = `translate(-50%, -50%) rotate(${angle}deg)`;
            
            // Scale based on speed for a stretching effect
            const stretch = Math.min(1 + speed / 400, 1.3);
            this.cursor.style.transform += ` scaleX(${stretch})`;
        } else {
            this.cursor.style.transform = 'translate(-50%, -50%)';
        }
        
        // Continue animation loop
        requestAnimationFrame(this.animate.bind(this));
    }
    
    refresh() {
        // Re-bind events after DOM changes
        this.addEventListeners();
    }
    
    destroy() {
        if (this.cursor) {
            document.body.removeChild(this.cursor);
        }
        
        this.trails.forEach(trail => {
            if (trail.element) {
                document.body.removeChild(trail.element);
            }
        });
        
        // Remove event listeners
        document.removeEventListener('mousemove', this.onMouseMove.bind(this));
        document.removeEventListener('mousedown', this.onMouseDown.bind(this));
        document.removeEventListener('mouseup', this.onMouseUp.bind(this));
        document.removeEventListener('mousemove', this.checkElementColor.bind(this));
    }
}








// export default class LightCursor {
//     constructor(options = {}) {
//         this.options = {
//             size: options.size || 15,
//             color: options.color || '#000000',
//             zIndex: options.zIndex || 9999,
//             removeDefault: options.removeDefault || false,
//             trailCount: options.trailCount || 5,
//             ...options
//         };
        
//         this.cursor = null;
//         this.trails = [];
//         this.mouseX = 0;
//         this.mouseY = 0;
//         this.targetX = 0;
//         this.targetY = 0;
//         this.isVisible = true;
//         this.frame = 0;
        
//         this.init();
//     }
    
//     init() {
//         // Create main cursor
//         this.cursor = document.createElement('div');
//         this.cursor.classList.add('light-cursor');
        
//         // Style cursor
//         this.cursor.style.width = `${this.options.size}px`;
//         this.cursor.style.height = `${this.options.size}px`;
//         this.cursor.style.border = `2.5px solid ${this.options.color}`;
//         this.cursor.style.borderRadius = '50%';
//         this.cursor.style.position = 'fixed';
//         this.cursor.style.pointerEvents = 'none';
//         this.cursor.style.zIndex = this.options.zIndex;
//         this.cursor.style.transform = 'translate(-50%, -50%)';
//         // No transition - we'll handle movement with animation
        
//         // Create multiple trail elements for a fun effect
//         for (let i = 0; i < this.options.trailCount; i++) {
//             const trail = document.createElement('div');
//             trail.classList.add('light-cursor-trail');
//             trail.style.width = `${this.options.size * (0.8 - i * 0.1)}px`;
//             trail.style.height = `${this.options.size * (0.8 - i * 0.1)}px`;
//             trail.style.backgroundColor = 'transparent';
//             trail.style.border = `1.5px solid ${this.options.color}`;
//             trail.style.opacity = 0.7 - (i * 0.1);
//             trail.style.borderRadius = '50%';
//             trail.style.position = 'fixed';
//             trail.style.pointerEvents = 'none';
//             trail.style.zIndex = this.options.zIndex - 1;
//             trail.style.transform = 'translate(-50%, -50%)';
            
//             document.body.appendChild(trail);
//             this.trails.push({
//                 element: trail,
//                 x: 0,
//                 y: 0,
//                 delay: i * 2  // Each trail follows with a delay
//             });
//         }
        
//         // Add to DOM
//         document.body.appendChild(this.cursor);
        
//         // Remove default cursor if needed
//         if (this.options.removeDefault) {
//             document.body.style.cursor = 'none';
            
//             // Add to all clickable elements
//             const clickables = document.querySelectorAll('a, button, input, textarea, select');
//             clickables.forEach(el => {
//                 el.style.cursor = 'none';
//             });
//         }
        
//         // Add event listeners with performance optimizations
//         this.addEventListeners();
        
//         // Start animation loop
//         this.animate();
//     }
    
//     addEventListeners() {
//         // Use passive event listeners for performance
//         document.addEventListener('mousemove', this.onMouseMove.bind(this), { passive: true });
//         document.addEventListener('mousedown', this.onMouseDown.bind(this), { passive: true });
//         document.addEventListener('mouseup', this.onMouseUp.bind(this), { passive: true });
//         document.addEventListener('mouseleave', () => { 
//             this.isVisible = false;
//             this.cursor.style.opacity = '0';
//             this.trails.forEach(trail => {
//                 trail.element.style.opacity = '0';
//             });
//         }, { passive: true });
//         document.addEventListener('mouseenter', () => { 
//             this.isVisible = true;
//             this.cursor.style.opacity = '1';
//             this.trails.forEach((trail, i) => {
//                 trail.element.style.opacity = 0.7 - (i * 0.1);
//             });
//         }, { passive: true });
        
//         // Handle link hovers
//         const links = document.querySelectorAll('a, button, input[type="submit"], input[type="button"]');
//         links.forEach(link => {
//             link.addEventListener('mouseenter', this.onLinkHover.bind(this), { passive: true });
//             link.addEventListener('mouseleave', this.onLinkLeave.bind(this), { passive: true });
//         });
//     }
    
//     onMouseMove(e) {
//         this.targetX = e.clientX;
//         this.targetY = e.clientY;
//     }
    
//     onMouseDown() {
//         this.cursor.style.transform = 'translate(-50%, -50%) scale(0.8)';
//         this.trails.forEach(trail => {
//             trail.element.style.transform = 'translate(-50%, -50%) scale(0.6)';
//         });
//     }
    
//     onMouseUp() {
//         this.cursor.style.transform = 'translate(-50%, -50%) scale(1)';
//         this.trails.forEach(trail => {
//             trail.element.style.transform = 'translate(-50%, -50%) scale(1)';
//         });
//     }
    
//     onLinkHover() {
//         this.cursor.style.transform = 'translate(-50%, -50%) scale(1.5)';
//         this.cursor.style.backgroundColor = 'rgba(0,0,0,0.1)';
        
//         this.trails.forEach(trail => {
//             trail.element.style.backgroundColor = 'rgba(0,0,0,0.05)';
//             trail.element.style.transform = 'translate(-50%, -50%) scale(1.2)';
//         });
//     }
    
//     onLinkLeave() {
//         this.cursor.style.transform = 'translate(-50%, -50%) scale(1)';
//         this.cursor.style.backgroundColor = 'transparent';
        
//         this.trails.forEach(trail => {
//             trail.element.style.backgroundColor = 'transparent';
//             trail.element.style.transform = 'translate(-50%, -50%) scale(1)';
//         });
//     }
    
//     animate() {
//         // Calculate cursor movement with smooth easing
//         const ease = 0.15; // Lower = smoother/slower (0.05 to 0.2 is good range)
        
//         // Update main cursor position with easing
//         this.mouseX += (this.targetX - this.mouseX) * ease;
//         this.mouseY += (this.targetY - this.mouseY) * ease;
        
//         // Apply position to main cursor
//         this.cursor.style.left = `${this.mouseX}px`;
//         this.cursor.style.top = `${this.mouseY}px`;
        
//         // Update trails with staggered delay
//         this.trails.forEach((trail, index) => {
//             // Each trail follows the previous one with delay
//             if (index === 0) {
//                 trail.x += (this.mouseX - trail.x) * (ease - 0.05);
//                 trail.y += (this.mouseY - trail.y) * (ease - 0.05);
//             } else {
//                 const prevTrail = this.trails[index - 1];
//                 trail.x += (prevTrail.x - trail.x) * (ease - 0.02);
//                 trail.y += (prevTrail.y - trail.y) * (ease - 0.02);
//             }
            
//             trail.element.style.left = `${trail.x}px`;
//             trail.element.style.top = `${trail.y}px`;
//         });
        
//         // Add slight rotation or animation based on movement speed
//         const dx = this.targetX - this.mouseX;
//         const dy = this.targetY - this.mouseY;
//         const speed = Math.sqrt(dx * dx + dy * dy);
        
//         if (speed > 1) {
//             const angle = Math.atan2(dy, dx) * (180 / Math.PI);
//             this.cursor.style.transform = `translate(-50%, -50%) rotate(${angle}deg)`;
            
//             // Scale based on speed for a stretching effect
//             const stretch = Math.min(1 + speed / 400, 1.3);
//             this.cursor.style.transform += ` scaleX(${stretch})`;
//         } else {
//             this.cursor.style.transform = 'translate(-50%, -50%)';
//         }
        
//         // Continue animation loop
//         requestAnimationFrame(this.animate.bind(this));
//     }
    
//     refresh() {
//         // Re-bind events after DOM changes
//         this.addEventListeners();
//     }
    
//     destroy() {
//         if (this.cursor) {
//             document.body.removeChild(this.cursor);
//         }
        
//         this.trails.forEach(trail => {
//             if (trail.element) {
//                 document.body.removeChild(trail.element);
//             }
//         });
        
//         // Remove event listeners
//         document.removeEventListener('mousemove', this.onMouseMove.bind(this));
//         document.removeEventListener('mousedown', this.onMouseDown.bind(this));
//         document.removeEventListener('mouseup', this.onMouseUp.bind(this));
//     }
// }