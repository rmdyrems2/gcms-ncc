// $(document).ready(function() {
//     $('#searchInput').on('input', function() {
//       var searchQuery = $(this).val();
//       if (searchQuery.length >= 2) {
//         searchUsers(searchQuery);
//       } else {
//         $('#searchResults').empty();
//       }
//     });
//   });
  
//   function searchUsers(keyword) {
//     $.ajax({
//       url: 'search.php',
//       method: 'GET',
//       data: { keyword: keyword },
//       dataType: 'json',
//       success: function(response) {
//         var resultsDropdown = $('#searchResults');
//         resultsDropdown.empty();
  
//         if (response.length > 0) {
//           $.each(response, function(index, user) {
//             var option = '<option value="' + user.id + '">' + user.name + '</option>';
//             resultsDropdown.append(option);
//           });
//         } else {
//           resultsDropdown.append('<option value="">No results found</option>');
//         }
//       },
//       error: function(xhr, status, error) {
//         console.log('Error: ' + error);
//       }
//     });
//   }
  
//   function sendMessage() {
//     var userId = $('#searchResults').val();
//     var messageContent = $('#messageContent').val();
  
//     // You can use AJAX to send the message details to the server for further processing
//     // Add your AJAX code here
//   }
document.addEventListener('DOMContentLoaded', function () {
  // Get chat bubble and chat box elements
  const chatBubble = document.getElementById('chat-bubble');
  const chatBox = document.getElementById('chat-box');
  const minimizeButton = document.getElementById('minimize-chat');

  // Function to toggle the chat box (minimize/maximize)
  function toggleChatBox(event) {
      if (event.target === chatBubble) {
          chatBox.style.display = chatBox.style.display === 'block' ? 'none' : 'block';
      }
  }

  // Set click event on the chat bubble to toggle the chat box
  chatBubble.addEventListener('click', toggleChatBox);

  // Function to minimize the chat box
  function minimizeChatBox() {
      chatBox.style.display = 'none';
  }

  // Set click event on the minimize button to minimize the chat box
  minimizeButton.addEventListener('click', minimizeChatBox);

  // Add an event listener to prevent closing the chat box when clicking inside the text area
  document.getElementById('chat-input').addEventListener('click', function (event) {
      event.stopPropagation();
  });
});