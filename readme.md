## About

A basic plugin for Asana to load all tasks you are assigned to accross **all workspaces**. Asana does not provice a global 'my tasks' overview, but does offer a nice API to create this yourself ;)

### Screenshot
![A screenshot of the interface](screenshot.png?raw=true)

### What you can do with it now:
- 4 columns overview with my tasks: Today, Upcoming, Later and New
- Each task shows the title, the projectname (incl. asana color), workspace and due date
- Drag and drop tasks to change priority (move from Upcoming to Today for instance)
- Complete tasks
- Click on tasks and it will open the task in Asana
- You can even add new tasks in the bottom
- The sidebar provides links to all your Asana workspaces.

### What I still would like to improve:
- Linking to a task within a project works just fine. But linking to a task that does not belong to a project or to the workspace overview ‘My Tasks’ page is not so easy. For some reason the workspace ID returned by the Asana API cannot be used for the workspace URL. So I coded these links manually in my code in the config file… See also github for more info on this. Not a big problem.
- Mobile… I tried also to make it look nice on mobile, yet this part is still a bit buggy. Just needs some love.

## Installation

1. Get an API key by [first logging in to Asana](https://app.asana.com). In the topright click on your workspace name > My Profile Settings > Apps > Manage Developer Apps. Create your Personal Access Token.

2. Open the file config-example.php and rename it to config.php. Paste your Personal Access Token

3. (optional) Expand config.php with workspace ID - URLs conversion to be able to use quick links to workspaces (see config.php comments for more info)

4. Upload to a server or host locally

## Usage

View all your tasks! Get productive. Yay!

You can even drag and drop your tasks in different columns. They will be synchronised with Asana.

## API

Read more about [Asana API here](https://asana.com/developers/)