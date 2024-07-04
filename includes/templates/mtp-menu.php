<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css">

<style>
    table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
        text-align: left !important;
    }
    .dt-buttons button{
        display: none;
    }
</style>


<div class="wrap">
    <h1 class="wp-heading-inline">MTP Posts</h1>

    <?php
        $posts = get_posts(
            array(
                'post_type' => 'post'
            )
        );
    ?>

        <table id="example" class="table table-striped nowrap" style="width:100%;">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Post Image</th>
                    <th>Post Title</th>
                    <th>Post Category</th>
                    <th>Author Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sn = 1;
                foreach ($posts as $post):
                    setup_postdata($post); // Setup global $post variable
                    $cats = get_the_category($post->ID); // Use get_the_category() to get categories
                    $cat_names = wp_list_pluck($cats, 'name');
                    $final_cat_name = implode(', ', $cat_names);
                ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo get_the_post_thumbnail($post->ID, array(100, 50)); ?></td>
                        <td><?php echo $post->post_title; ?></td>
                        <td><?php echo $final_cat_name; ?></td>
                        <td><?php the_author(); ?></td>
                        <td><a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="btn btn-primary">Edit</a> <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=trash&_wpnonce=de2f98bde7" class="btn btn-danger" >Delete</a></td>
                    </tr>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </tbody>
        </table>


</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>


<script>
    new DataTable('#example', {
        layout: {
            topStart: {
                buttons: [
                    {
                        config: {
                            creationModal: true,
                            toggle: {
                                columns: {
                                    search: true,
                                    visible: true
                                },
                                length: true,
                                order: true,
                                paging: true,
                                search: true
                            }
                        }
                    }
                ]
            }
        }
    });
</script>






























