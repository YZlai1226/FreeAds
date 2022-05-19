# FreeAds

FreeAds is a free-publishing ads website created with laravel 9.

![](2022-05-19-00-47-49.png)

## Description

### HomePage
This page displays all the ads and lets you filter them by categories and order by: “Newest, Oldest and Price”. You can use a search bar too.  

Each post contains the picture, title, category, location, price and the first 150 characters of the description. The “see more” button redirects you to the ad’s page which contain the whole description and the owner's contact information. 

### Authentification 
You must register on our website using a nickname, email, phone number and a strong password (Hashed and Salted). A confirmation email will be sent to the address submitted. You can also use your email in case you forget your password. To login you need to verify your email and have a strong password. 

### User profile
This page is protected, the user can edit all personal information, see the posted ads, and edit and delete them. 

### Admin page
This page is restricted to users and can only be reached by admins. They can: 
- See, edit and delete users’ profiles.  
- See, create, edit and delete categories.  
- Accept or reject pending ads requests.
