# 🔧 **Admin Guide - Optimus Software Limited**

## 📋 **Admin Panel Overview**

The admin panel allows you to manage all aspects of your website without writing any code. You can update content, upload images, manage services, post job circulars, and view customer messages.

## 🌐 **Accessing the Admin Panel**

**Admin Dashboard URL**: `http://127.0.0.1:8000/admin/dashboard`

## 🎯 **Admin Features**

### **1. 🏠 Homepage Management**
**URL**: `/admin/homepage-settings`

**What you can do:**
- ✅ Update hero section title and description
- ✅ Upload hero background image
- ✅ Update about section content
- ✅ Upload about section image
- ✅ Update contact information (email, phone, address)
- ✅ Add social media links (Facebook, Twitter, LinkedIn, Instagram)

**How to upload images:**
1. Click "Choose File" next to the image field
2. Select an image (JPEG, PNG, JPG, GIF - Max 2MB)
3. Click "Save Changes"
4. The image will be automatically resized and optimized

### **2. 🛠️ Services Management**
**URL**: `/admin/services`

**What you can do:**
- ✅ View all services
- ✅ Add new services
- ✅ Edit existing services
- ✅ Delete services
- ✅ Upload service images
- ✅ Set service order (sort_order)
- ✅ Enable/disable services

**How to add a new service:**
1. Go to `/admin/services`
2. Click "Add New Service"
3. Fill in the form:
   - **Title**: Service name (e.g., "Web Development")
   - **Description**: Detailed description of the service
   - **Icon**: Font Awesome class (optional, e.g., "fas fa-laptop-code")
   - **Image**: Upload a service image
   - **Sort Order**: Number to control display order (lower = first)
   - **Active**: Check to make visible on website
4. Click "Create Service"

**How to upload service images:**
1. In the service form, click "Choose File" under "Service Image"
2. Select an image file (JPEG, PNG, JPG, GIF - Max 2MB)
3. The image will be stored in `/storage/services/` folder
4. Images are automatically optimized for web display

### **3. 💼 Job Circulars Management**
**URL**: `/admin/job-circulars`

**What you can do:**
- ✅ View all job postings
- ✅ Post new job circulars
- ✅ Edit existing jobs
- ✅ Delete job postings
- ✅ Set application deadlines
- ✅ Manage job status (active/inactive)

**How to post a new job:**
1. Go to `/admin/job-circulars`
2. Click "Post New Job"
3. Fill in the job details:
   - **Job Title**: Position name (e.g., "Senior Laravel Developer")
   - **Description**: Job responsibilities and details
   - **Requirements**: Required skills and qualifications
   - **Location**: Job location or "Remote"
   - **Job Type**: Full-time, Part-time, Contract, or Internship
   - **Salary Range**: Minimum and maximum salary (optional)
   - **Application Deadline**: Last date to apply
   - **Active**: Check to make visible on careers page
4. Click "Post Job"

**Job Status Indicators:**
- 🟢 **Active + Open**: Job is active and deadline hasn't passed
- 🔴 **Active + Expired**: Job is active but deadline has passed
- ⚫ **Inactive**: Job is not visible on the website

### **4. 📧 Customer Messages**
**URL**: `/admin/contacts`

**What you can do:**
- ✅ View all customer messages
- ✅ Mark messages as read/unread
- ✅ See message details (name, email, phone, subject, message)
- ✅ View message timestamps

**Message Management:**
- **New messages** are marked with a red "New" badge
- Click "Mark as Read" to mark messages as read
- Messages are paginated (20 per page)
- All customer information is displayed clearly

## 📁 **File Upload Guidelines**

### **Image Upload Specifications:**
- **Supported formats**: JPEG, PNG, JPG, GIF
- **Maximum file size**: 2MB
- **Recommended dimensions**:
  - Hero images: 1920x1080px
  - About images: 800x600px
  - Service images: 400x300px

### **Where images are stored:**
- Homepage images: `/storage/images/`
- Service images: `/storage/services/`
- All uploaded files are publicly accessible via `/storage/` URL

## 🎨 **Content Management Tips**

### **Writing Effective Content:**
1. **Hero Title**: Keep it concise and impactful (max 60 characters)
2. **Descriptions**: Write clear, engaging descriptions
3. **Service Titles**: Use descriptive, professional names
4. **Job Descriptions**: Be specific about requirements and responsibilities

### **SEO Best Practices:**
- Use descriptive titles and headings
- Write unique descriptions for each service
- Include relevant keywords naturally
- Keep content fresh and updated

## 🔧 **Admin Panel Navigation**

### **Main Menu:**
- **Dashboard** (`/admin/dashboard`) - Overview and statistics
- **Homepage Settings** (`/admin/homepage-settings`) - Update homepage content
- **Services** (`/admin/services`) - Manage company services
- **Job Circulars** (`/admin/job-circulars`) - Post and manage jobs
- **Contacts** (`/admin/contacts`) - View customer messages

### **Quick Actions:**
- All admin pages have "Back" navigation
- "View Site" link to see public website
- Success messages confirm actions
- Form validation prevents errors

## 🚨 **Important Notes**

### **Data Safety:**
- Always backup before making major changes
- Test changes on a staging environment first
- Keep original images as backups

### **Image Optimization:**
- Images are automatically optimized for web
- Large images may take longer to upload
- Use high-quality images for best results

### **Content Guidelines:**
- Keep content professional and accurate
- Update job deadlines regularly
- Respond to customer messages promptly
- Review and update services periodically

## 📞 **Support**

If you need help with the admin panel:
1. Check this guide first
2. Test on the development server
3. Contact technical support if needed

## 🎯 **Quick Start Checklist**

✅ **Initial Setup:**
- [ ] Update homepage hero section
- [ ] Upload company logo and images
- [ ] Add/update all services
- [ ] Set up contact information
- [ ] Add social media links

✅ **Regular Maintenance:**
- [ ] Check and respond to customer messages
- [ ] Update job circulars as needed
- [ ] Review and update service descriptions
- [ ] Keep homepage content fresh

Your Optimus Software Limited website is now fully manageable through the admin panel!