# Online Food Ordering System:

Online food ordering is the process of ordering food from a website.User can order the  Food from different Restaurants.And also at the admin side we manage all the things like food, order, revenue and more.




1. **Home Page:**
   - Users click on "Order here" to proceed.
   - After clicking on that button user redirects to the Restaurant List page.

2. **Restaurant List (restaurantlist.php):**
   - They can select a restaurant.
   - Clicking on a specific restaurant leads to the food items page.

3. **Food Items (foodlist.php):**
   - Users can view the restaurant's food items.
   - They can add food items to their order.
   - Customization options are available.
   - Cart items in the navbar are updated.

https://github.com/DhruvPatel2105/fullstack_react_project/assets/58779025/2943d143-cca6-4637-80f9-3f5e883d8af5


4. **Login Page:**
   - Users provide their email ID.
   - Redirects to either signup or login based on input.

https://github.com/DhruvPatel2105/fullstack_react_project/assets/58779025/96420682-aea1-44f2-b185-c71cafe2651c


5. **Forgot Password:**
   - I use the token based authentication for this 
   - When User request for the password reset it will generate a Unique Token Store into the database.
   - With the help of php mailer we can send email the Reset password Link.
   - After Token Verification it will redirect to the new password page where you can set your new password. 
   - unfortunatley my php mailer library is not working due to some error so for that reason I removed it.But if you want to use it then you can refer this (https://github.com/PHPMailer/PHPMailer). So right now reset password is not working in my system.

6. **Cart Page**
   - In the cart we can perform the CRUD operations on the Food items with the total of price.
   - CRUD operations are based on the session data.

<img width="1462" alt="cart" src="https://github.com/DhruvPatel2105/employeemanager/assets/58779025/dcd6008c-6801-4eb8-9e78-91d3497e5655">


7. **Payment**
   - On the payment page we can show the Grand Total.
   - As well as we can Downlaod the PDF of our Order.

<img width="1470" alt="payment" src="https://github.com/DhruvPatel2105/employeemanager/assets/58779025/60b03065-53f4-4bfe-bd4e-27f25fc0f718">

   - Order bill PDF:

<img width="1470" alt="pdf" src="https://github.com/DhruvPatel2105/employeemanager/assets/58779025/28a19b60-fc52-4f99-84f9-adcc68265490">


8. **Payment Confirmation**
   - we got this page after the Placing order from the Payment Page.
   - We got the Order Number
   - The total quantity of the Food items is reduced by the amount of quantity which is ordered now.So basically it will affect to the available quantity of the food items.

<img width="1470" alt="confirm" src="https://github.com/DhruvPatel2105/employeemanager/assets/58779025/fc44a27a-17e6-46ff-9130-771861d44702">


9. **After Order Navbar**
   - all the session items is removed except the Login one. 
   - the Login details session is removed when user clicks on the Logout Button.

<img width="1470" alt="after order navbar" src="https://github.com/DhruvPatel2105/employeemanager/assets/58779025/111ce916-2c31-4ced-b71c-ea53c83a1e77">


10. **Admin Management:**
   - Admin manages food menas we can do the CRUD operation on that.
   - we can show number of orders, revenue, and more on the admin side.
   - still I am plannign to go more with admin part like generate graph basis on different restaurnat and customer base profite and all and these all things possible because I have dataset.
   - for more information you can see the atteched video.

https://github.com/DhruvPatel2105/employeemanager/assets/58779025/0a54ef1c-68b7-4f6c-8b1e-0dd8b50bc135


**Responsive Of Website**
  - our website is fully responsive as you can see the atteched screenshots.


Mobile view

<img width="209" alt="mobile XR" src="https://github.com/DhruvPatel2105/Hi_Tech_Cafe_Oops/assets/58779025/fa1ae0ff-5728-431e-af7b-edbec179fe85">
<img width="210" alt="Mobile XR navbar" src="https://github.com/DhruvPatel2105/Hi_Tech_Cafe_Oops/assets/58779025/6f88d2c9-9a4a-432e-bb4d-b947da1d6f21">


Table view

<img width="405" alt="ipad" src="https://github.com/DhruvPatel2105/Hi_Tech_Cafe_Oops/assets/58779025/a6bf1e58-2bfe-40ce-9cce-41c9078b80fd">



**User Authentication:**
  - Users must log in before proceeding to the cart and other pages except home, restaurantlist, foodlist pages.
  - If not logged in, they are prompted to do so.

**OOPS Concept:**
  - In this project I use the class and Object methods to perform the operations.


**Database Structure**

<img width="1042" alt="DB ER-Diagram" src="https://github.com/DhruvPatel2105/Hi_Tech_Cafe_Oops/assets/58779025/cda89484-6e4b-47be-941e-23f0907dadad">


**Jira Software**
   - For the project management and issue tracking I used the Jira Software. 

<img width="1470" alt="Jira Software" src="https://github.com/DhruvPatel2105/Hi_Tech_Cafe_Oops/assets/58779025/7870af28-a175-4b58-9088-a5cd2ba77258">

