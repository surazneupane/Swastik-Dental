@include('admin.layouts.head')
<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('admin.layouts.sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('admin.layouts.header')
            @yield('body')
        </div>
    </div>
<x-flash-message/>
    <script>
        var inputCounter = 2
        function addInputField() {
            // document.write("What the fun!")

            var i=2;

            //Create a new label
            var newLabel = document.createElement('label');
                newLabel.innerHTML = "Service Name:";
                newLabel.setAttribute("for", "added_service");
            newLabel.classList.add( "text-sm","text-gray-700", "dark:text-gray-400");

            // Create a new input element
            var newInput = document.createElement('input');
            newInput.type = 'text';


            newInput.name = 'serviceName_' + inputCounter ;
            newInput.placeholder = 'Name of service';

            newInput.setAttribute("id", "added_service");

            newInput.classList.add("block", "w-full", "mt-1", "text-sm" , "dark:border-gray-600", "dark:bg-gray-700", "focus:border-purple-400", "focus:outline-none", "focus:shadow-outline-purple", "dark:text-gray-300" , "dark:focus:shadow-outline-gray", "form-input");

            inputCounter++;
            // Create a new button element
            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = 'Remove';
            removeButton.classList.add("right","mt-1","light-red-100","underline","text-sm");
            removeButton.onclick = function() {
                removeInputField(removeButton);
            };

            // Create a new div container for the input and button
            var container = document.createElement('div');
            container.classList.add('input-container');
            container.appendChild(newLabel);
            container.appendChild(newInput);
            container.appendChild(removeButton);

            // Append the new container to the main container
            document.getElementById('input-container').appendChild(container);
        }

        function removeInputField(button) {
            // Get the parent container of the button (which is the input container)
            var container = button.parentNode;

            // Remove the container from the parent
            container.parentNode.removeChild(container);
        }
    </script>

</body>
</html>
