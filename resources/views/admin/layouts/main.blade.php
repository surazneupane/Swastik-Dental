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

            // Create a new input element
            var newInput = document.createElement('input');
            newInput.type = 'text';

            newInput.name = 'serviceName_' + inputCounter ;
            newInput.placeholder = 'Enter something';

            inputCounter++;
            // Create a new button element
            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = 'Remove';
            removeButton.onclick = function() {
                removeInputField(removeButton);
            };

            // Create a new div container for the input and button
            var container = document.createElement('div');
            container.classList.add('input-container');
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
