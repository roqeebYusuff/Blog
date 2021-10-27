<section class="all-blogs" style="margin-top: 50px;">
    <div class="container"> 
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?= \Config\Services::validation()->listErrors(); ?>
            <form action="/blog/create" method="post">
                <?= csrf_meta() ?>
                <label for="author">Author</label>
                <input type="text"  name="author"/><br />

                <label for="title">Title</label>
                <input type="text"  name="title"/><br />

                <label for="views">Views</label>
                <input type="text"  name="views"/><br />

                <label for="image">Image</label>
                <input type="file" accept=".jpg,.jpeg,.png,.gif" name="image" id="image"/><br />

                <label for="intro">Intro</label>
                <input type="text"  name="intro"/><br />

                <label for="body">Body</label>
                <input type="text"  name="body"/><br />

                <label for="published">Published</label>
                <input type="text"  name="published"/><br />
                
                <input type="submit"  name="submit" value="Create Blog"/>
            </form>
        </div>            
    </div>
</section>