
  <!DOCTYPE html>
  <html lang="en">

  <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">

      <title>ITS-Classroom Hotline</title>


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">


      <link href="css/bootstrap.css" rel="stylesheet">

      <link href="css/mdb.css" rel="stylesheet">


  </head>

<body>
<h1> ITS-Classroom Hotline</h1>
<h2>By: Keith Whitley, Patric Carman, and Caleigh Link</h2>

<a href="home.html"> MOCKUP </a>

<h3>Overview</h3>
<p>The basic idea of this project is the redesign of the current ITS-Classroom Hotline website.
None of the links are currently working due to the necessary resources we will need as the project
progresses. Some of these links are merely placeholders that have no real purpose and will be removed
as we progress with the project. The general components are Tickets, Cameras, and Room Check Applications. Other buttons or links on this page
are simple webpages that uses data we don't have access to yet.
</p>
<h3> Tickets </h3>
<p> ITS uses Remedy to generate and manage the tickets we get. The main part of our job
is going to solve these tickets. However, there is currently no existing way to access our tickets
without opening Remedy. As such, managing tickets can be cumbersome as we may get tickets when we are out of the office.
As such, the main part of the employee website needs to be the tickets. With this design, the tickets are front and center,
showing us which tickets we have, and when the room opens up. This data is found using Remedy's API as well as Ad Astra's Scheduling
API (Ad Astra is what we use to handle the scheduling of classrooms). There is also a section for updating tickets. Most of the time,
we only update the worklog and status when we complete tickets (Most of the other fields are auto-completed upon submission). As such,
we are able to reduce the size of this section, allowing for a more simplistic interface that makes it easier to update tickets.</p>

<h3>Cameras</h3>
<p>
  The cameras will be a searchable drop-down menu that will allow for any employee to look at the camera of a room simply by typing
  the building and room number. If there is no room number entered, the website should return a webpage with all of the cameras for that building.
</p>

<h3>Room Check Application</h3>
<p>
  The Room Check Application will simply be a new webpage that will essentially be a restyled version of the current one. Since this
  part of the website is decently functional, we probably will only make stylistic changes to view and maybe a shorter version since some of the fields
  can be reduntant.
</p>


<h3>Next Steps</h3>
<p>
  The next steps would be to begin impementing the Remedy API to begin to implement the core functionality of the
  website. We are currently scheduled to meet with a ITS Admin who manages the Remedy System in order to create a beta group
  so that we can begin testing it without potentially breaking something. We've also been in contact with someone from DOM-IS who
  wrote a script for ticket updating via emails in order to get a general idea of the best way to do this.
</p>


</body>
