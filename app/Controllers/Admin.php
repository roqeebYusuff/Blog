<?php namespace App\Controllers;

class Admin extends BaseController
{
    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->adminModel = model('App\Models\AdminModel');                 
    }

    // Dashboard
    public function index()
    {
        $posts = $this->db->table('posts');
        $comments = $this->db->table('comments');
        $replies = $this->db->table('replies');  

		$this->check_login();
        $data['title'] = 'Dashboard';
        $data['active'] = 'Dashboard';

        $data['posts'] = $posts->countAll();
        $data['comments'] = $comments->countAll();
        $data['replies'] = $replies->countAll();

        echo view('admin/layout/header',$data);
        echo view('admin/dashboard', $data);
        echo view('admin/layout/footer');
    }

    // Get Users
    function get_users()
    {
        $users = $this->adminModel->findAll();
        echo json_encode(array("aaData"=>$users));
    }

    // Get Posts
    function get_posts()
    {
        $posts = $this->db->table('posts')->getwhere(['published' => 'YES'])->getResult(); 
        echo json_encode((array("aaData"=>$posts)));
    }

    // Get All Posts
    function posts()
    {
        $this->check_login();
        $data['title'] = 'Posts';
        $data['active'] = 'Posts';        

        echo view('admin/layout/header',$data);
        echo view('admin/posts');
        echo view('admin/layout/footer');

    }

    // Save User
    function save_user()
    {
        $data = $this->request->getPost();

        //Upload image if it exists
        $pic = isset($data->profile_pic) ? $data->profile_pic : NULL;

        $avatar = $this->request->getFile('profile_pic');
       
        if(isset($avatar))
        {
            $pic = $avatar->getName();
            $avatar->move(ROOTPATH.'public/assets/uploads/profile-pictures');
        }

        $data['profile_pic'] = $pic;

        if($this->adminModel->save($data))
        {
            echo 'success';
        }

        else
        {
            echo 'error';
        }
    }

    //Get User Edit
    public function get_edit($id)
    {
        $user = $this->adminModel->where('id',$id)->findAll();

        if(sizeof($user) > 0)
        {
            $user = $user[0];
            $data['user'] = $user;
            echo view('admin/user_edit',$data);
        }

        else
        {
            echo "Invalid User";
        }
    }

    public function get_post_edit($id)
    {
        $post = 'SUccess';
        $table = $this->db->table('posts');
        $post = $table->getwhere(['id' => $id])->getResult();

        if(sizeof($post) > 0)
        {
            $posts = $post[0];
            $data['post'] = $posts;
            echo view('admin/post_edit', $data);
        }

        else
        {
            echo "Invalid User";
        }
    }

    //Delete User
    public function delete($id)
    {
        $delete = $this->adminModel->delete($id);
        if($delete)
        {
            echo 'User Successfully Deleted';
        }

        else
        {
            echo 'Unable to Delete User...Try again';
        }
    }

    // Users
    public function users()
    {
        $this->check_login();
        $data['title'] = 'Users';
        $data['active'] = 'Users';
        
        echo view('admin/layout/header',$data);
        echo view('admin/users');
        echo view('admin/layout/footer');
    }

    public function profile()
    {
		$this->check_login();
        $data['title'] = 'Profile';
        $data['active'] = 'Profile';
        echo view('admin/layout/header',$data);
        echo view('admin/profile');
        echo view('admin/layout/footer');
    }

    //Create post
    public function create()
    {
		$this->check_login();
        if($this->request->getMethod() === 'post')
        {
            $builder = $this->db->table('posts');

            $data = $this->request->getPost();

            //Set the slug
            $data['slug'] = url_title($this->request->getPost('title'), '-', TRUE);

            //Post image
            // $pic = 'new.jpg';
            $img = $this->request->getFile('image');
            
            $move = $img->move(ROOTPATH.'public/assets/uploads/post-pictures');

            if($move)
            {
                $data['image'] = $img->getName();

                $res = $builder->insert($data);

                if($res)
                {
                    echo 'success';
                }

                else
                {
                    echo $res;
                }
            }

            else
            {
                echo ('Unable to upload file');
            }
            
        }   

        else
        {
            $data['title'] = 'Create Post';
            $data['active'] = 'Create';
            echo view('admin/layout/header',$data);
            echo view('admin/create');
            echo view('admin/layout/footer');
        }
    }

    // Update Post
    public function update_post()
    {
        $table = $this->db->table('posts');

        $data = $this->request->getPost();

         //Set the slug
         $data['slug'] = url_title($this->request->getPost('title'), '-', TRUE);

         //Post image
         $img = $this->request->getFile('image');
         
         $move = $img->move(ROOTPATH.'public/assets/uploads/post-pictures');

         if($move)
         {
             $data['image'] = $img->getName();
             
             $res = $table->where('id', $data['id'])->update($data);

             if($res)
             {
                 echo 'success';
             }

             else
             {
                 echo $res;
             }
         }

         else
         {
             echo ('Unable to upload file');
         }
    }

    // Delete Post
    public function deletePost($id)
    {
        $delete = $this->db->table('posts')->where('id',$id)->delete();
        if($delete)
        {
            echo "Post successfully Deleted";
        }
        else{
            echo "Unable to delete Post... Please Try again";
        }
    }

    // Login
    public function login()
    {
        $message = '';

        if($this->request->getMethod() == 'post')
        {
            $user = $this->adminModel->where($this->request->getPost())->findAll();

            if(sizeof($user) > 0){
                $this->session->set('ss_user',$user[0]);
                return redirect()->to('/admin');
            }

            else{
                $message = 'Invalid Username or password';
            }
        }

        $data['message'] = $message;
        echo view('admin/auth/login',$data);
    }

    // Logout
    public function logout()
    {
        $this->user_logout();
        return redirect()->to('/admin/login');
    }
}