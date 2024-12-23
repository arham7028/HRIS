// document.getElementById('jobForm').addEventListener('submit', function(event) {
//     event.preventDefault(); // Prevent form submission

//     // Retrieve form values
//     var jobType = document.getElementById('jobType').value;
//     var jobDescription = document.getElementById('jobDescription').value;
//     var location = document.getElementById('location').value;
//     var date = document.getElementById('date').value;
//     var budget = document.getElementById('budget').value;

//     // Do something with the form values (e.g., send to server)
//     console.log('Job Type:', jobType);
//     console.log('Job Description:', jobDescription);
//     console.log('Location:', location);
//     console.log('Date:', date);
//     console.log('Budget:', budget);

//     // Reset the form after submission (optional)
//     this.reset();
// });


// document.getElementById('jobForm').addEventListener('submit', function(event) {
//     event.preventDefault(); // Prevent form submission

//     // Retrieve form values
//     var jobType = document.getElementById('jobType').value;
//     var jobDescription = document.getElementById('jobDescription').value;
//     var location = document.getElementById('location').value;
//     var date = document.getElementById('date').value;
//     var budget = document.getElementById('budget').value;

//     // Do something with the form values (e.g., send to server)
//     console.log('Job Type:', jobType);
//     console.log('Job Description:', jobDescription);
//     console.log('Location:', location);
//     console.log('Date:', date);
//     console.log('Budget:', budget);

//     // Show success message 
  
//     var successMessage = document.getElementById('successMessage');
//     successMessage.classList.remove('hidden');

//     // Reset the form after submission (optional)
//     this.reset();
// });




// new 
// document.getElementById('jobForm').addEventListener('submit', function(event) {
//     event.preventDefault(); // Prevent form submission

//     // Retrieve form values
//     var jobType = document.getElementById('jobType').value;
//     var jobDescription = document.getElementById('jobDescription').value;
//     var location = document.getElementById('location').value;
//     var date = document.getElementById('date').value;
//     var budget = document.getElementById('budget').value;

//     // Do something with the form values (e.g., send to server)
//     console.log('Job Type:', jobType);
//     console.log('Job Description:', jobDescription);
//     console.log('Location:', location);
//     console.log('Date:', date); 
//     console.log('Budget:', budget);

//     var successMessage = document.getElementById('successMessage');
//         successMessage.classList.remove('hidden');

//     // Redirect to job details page with parameters
 
//         var queryString = '?jobType=' + encodeURIComponent(jobType) +
//                       '&jobDescription=' + encodeURIComponent(jobDescription) +
//                       '&location=' + encodeURIComponent(location) +
//                       '&date=' + encodeURIComponent(date) +
//                       '&budget=' + encodeURIComponent(budget);
//                       setTimeout(()=>{
//     window.location.href = 'job_details.html' + queryString;
//                       }, 3000)
// });
   




// modify
document.getElementById('jobForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Retrieve form values
    var jobType = document.getElementById('jobType').value;
    var jobDescription = document.getElementById('jobDescription').value;
    var location = document.getElementById('location').value;
    var date = document.getElementById('date').value;
    var budget = document.getElementById('budget').value;
    var photo = document.getElementById('photo').files[0]; // Get uploaded photo file

    // Display form values in job details card
    document.getElementById('jobType').textContent = jobType;
    document.getElementById('jobDescription').textContent = jobDescription;
    document.getElementById('location').textContent = location;
    document.getElementById('date').textContent = date;
    document.getElementById('budget').textContent = budget;

    // Display uploaded photo
    if (photo) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.getElementById('jobPhoto');
            img.src = e.target.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(photo);
    }

    // Show success message 
    var successMessage = document.getElementById('successMessage');
    successMessage.classList.remove('hidden');


    var queryString = '?jobType=' + encodeURIComponent(jobType) +
                          '&jobDescription=' + encodeURIComponent(jobDescription) +
                          '&location=' + encodeURIComponent(location) +
                          '&date=' + encodeURIComponent(date) +
                          '&budget=' + encodeURIComponent(budget);
                          setTimeout(()=>{
        window.location.href = 'job_details.html' + queryString;
                          }, 2000)
    // Reset the form after submission (optional)
    this.reset();
});




    

