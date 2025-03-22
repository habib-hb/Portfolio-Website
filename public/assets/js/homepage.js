 const profile_img = document.getElementById("profile_img");
 const my_name_text = document.getElementById("my_name");
 const full_stack = document.getElementById("full_stack");
 const developer = document.getElementById("developer");
 const based_in = document.getElementById("based_in");
 const scroll_down = document.getElementById("scroll_down");

 const animation_function = () => {
     //Doing 100ms delay cause the DOM is not loaded yet.
     setTimeout(() => {
         AOS.refresh();


         // profile_img.style.opacity = 0;
         // profile_img.style.transform = "translateY(16px)";

         my_name_text.style.opacity = 0;
         my_name_text.style.transform = "translateY(16px)";

         full_stack.style.opacity = 0;
         full_stack.style.transform = "translateY(16px)";

         developer.style.opacity = 0;
         developer.style.transform = "translateY(16px)";

         based_in.style.opacity = 0;
         based_in.style.transform = "translateY(16px)";

         scroll_down.style.opacity = 0;
         scroll_down.style.transform = "translateY(16px)";

         const timeline = gsap.timeline();

         // Add animations to the timeline in sequence
         timeline
             .to(my_name_text, {
                 opacity: 1,
                 duration: 1,
                 transform: "translateY(0)",
                 ease: "power2.out",
             })
             .to(full_stack, {
                 opacity: 1,
                 duration: 1,
                 transform: "translateY(0)",
                 ease: "power2.out",
             })
             .to(developer, {
                 opacity: 1,
                 duration: 1,
                 transform: "translateY(0)",
                 ease: "power2.out",
             })
             .to(based_in, {
                 opacity: 1,
                 duration: 1,
                 transform: "translateY(0)",
                 ease: "power2.out",
             })
             // .to(profile_img, {
             //     opacity: 1,
             //     duration: 1,
             //     transform: "translateY(0)",
             //     ease: "power2.out",
             // })
             .to(scroll_down, {
                 opacity: 1,
                 duration: 1,
                 transform: "translateY(0)",
                 ease: "power2.out",
             })


     }, 1);

 }

 const css_stablizer = () => {
     //Doing 100ms delay cause the DOM is not loaded yet.
     setTimeout(() => {
         AOS.refresh();

         profile_img.style.opacity = 1;
         profile_img.style.transform = "translateY(0)";

         my_name_text.style.opacity = 1;
         my_name_text.style.transform = "translateY(0)";

         full_stack.style.opacity = 1;
         full_stack.style.transform = "translateY(0)";

         developer.style.opacity = 1;
         developer.style.transform = "translateY(0)";

         based_in.style.opacity = 1;
         based_in.style.transform = "translateY(0)";

         scroll_down.style.opacity = 1;
         scroll_down.style.transform = "translateY(0)";

         if (document.getElementById('search_input').value == '' && document.activeElement !==
             document.getElementById('search_input')) {
             document.getElementById('search_icon').style.display = 'block';
             document.getElementById('search_text').style.display = 'block';
         }

         

     }, 1);

 }


 document.getElementById('input_div').addEventListener('click', () => {
     document.getElementById('search_input').focus();
     Livewire.dispatch('activate_search_input_field', {});
 })

 document.getElementById('search_input').addEventListener('focus', () => {
     document.getElementById('search_icon').style.display = 'none';
     document.getElementById('search_text').style.display = 'none';
 })




 document.getElementById('search_input').addEventListener('blur', () => {
     if (document.getElementById('search_input').value == '') {
         document.getElementById('search_icon').style.display = 'block';
         document.getElementById('search_text').style.display = 'block';
     }
 })



 function onRecaptchaSuccess(token) {
     // Pass the token to your Livewire component
     Livewire.dispatch('recaptcha_token', {
         token: token
     });
 }


 // Without this , the search bar shows the text previously entered when I come back using the back button even though the actual value of the input field is empty
 window.addEventListener('load', () => {
     setTimeout(() => {
         document.getElementById('search_input').value = '';
     }, 100);
 });

 let item = "";

 document.addEventListener('livewire:initialized', () => {

     // Sending Data To backend
     //  setTimeout(() => {
     if (document.getElementById('search_input').value == '') {
         Livewire.dispatch('new_load_alert_for_serch_strings', {});
     }

     Livewire.on('alert-manager', () => {
         // if (document.getElementById('search_input').value !== '') {
         if (document.getElementById('search_input').value !== '' || document.activeElement ===
             document.getElementById('search_input')) {
             setTimeout(() => {
                 document.getElementById('search_icon').style.display = 'none';
                 document.getElementById('search_text').style.display = 'none';
             }, 10);
         }
         css_stablizer();



     })

     Livewire.on('no_results_found', () => {
         // Doing 100ms delay cause the DOM is not loaded yet.
         setTimeout(() => {
             document.getElementById('no_results_found').textContent = 'No Results Found';

             if (document.getElementById('no_results_found').classList.contains('hidden')) {
                 document.getElementById('no_results_found').classList.remove('hidden');
             }
         }, 10);
     })

     Livewire.on('load_animation', () => { // Doing this to avoid the rerendering issue in javascript
         animation_function();
     })

     Livewire.on('redirect_to_admin_dashboard', () => {
         window.open("/admin_dashboard", "_blank");
     })

     document.addEventListener('click', function(event) {
         const admin_login_popup = document.getElementById('admin_login_popup');
         const notify_error_element = document.getElementById('notify_error_element') || null;
         const isClickInside = admin_login_popup.contains(event.target);
         const isClickInside_notify_error_element = notify_error_element?.contains(event.target);

         // If the click is outside the dropdown, perform an action
         if (!isClickInside && !isClickInside_notify_error_element) {
             if (!document.getElementById('admin_login_popup').classList.contains('hidden')) {
                 document.getElementById('admin_popup_close').click();
             }
         }
     });
 })