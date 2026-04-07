$(document).ready(function() {
    // 1. Attach a click event handler to the buttons, not the form submit event.
    $('.delete-confirm').on('click', function(event) {
        // Store a reference to the closest form element
        var $form = $(this).closest('form');
        
        // 2. Prevent the default button action
        event.preventDefault();

        // 3. Trigger your custom confirmation dialog
        // This is a conceptual example. You need an actual library for this.
        showConfirmationDialog($form);
    });

    function showConfirmationDialog($form) {
        // Replace this with your chosen dialog plugin's implementation.
        // The dialog must be asynchronous and provide a callback for 'Yes'.
        
        // Example using a hypothetical 'MyConfirmDialog' plugin:
        MyConfirmDialog.open({
            message: 'Are you sure you want to submit this form?',
            buttons: {
                yes: function() {
                    // 4. In the 'Yes' callback, manually submit the form
                    // Bypass the jQuery event handler to avoid infinite loops
                    $form.get(0).submit();
                },
                no: function() {
                    // Do nothing or close the dialog
                }
            }
        });
    }
});
