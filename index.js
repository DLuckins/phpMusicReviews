// function deleteProducts() {
//     let checkboxes = document.querySelectorAll('.delete-checkbox');
//     let deleteNames=[];
//     checkboxes.forEach(checkbox=>{
//         if(checkbox.checked){
//             deleteName = checkbox.nextSibling.innerHTML;
//             deleteNames.push(deleteName);
//             checkbox.parentElement.remove();
//         }
//     });
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "./fordb/removeProducts.php", true);
//     xhr.setRequestHeader('Content-Type', 'application/json');

//     xhr.onreadystatechange = function() {
//         if (xhr.readyState != 4) { return; }
//         var serverresponse = xhr.responseText;
//     };
//     xhr.send(JSON.stringify(deleteNames));
//  }