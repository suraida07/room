<?php
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: POST,GET ,OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization,X-Requested-with");
  header("Content-Type: application/json; charset-utf-8");
  header("Content-Type: application/json", true);
// get all todos
$app->group('/room', function () use ($args) {
    $app->get('/category', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM category ORDER BY category_id");
        $sth->execute();
        $category = $sth->fetchAll();
        return $this->response->withJson($category);
    });

    $app->get('/category/[{category_id}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM category WHERE category_id=:category_id");
        $sth->bindParam("category_id", $args['category_id']);
        $sth->execute();
        $category = $sth->fetchAll();
        return $this->response->withJson($category);
    });

    $app->get('/rentedroom', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM rentedroom ORDER BY rentedroom_id");
       $sth->execute();
       $todos = $sth->fetchAll();
       return $this->response->withJson($todos);
   });

   $app->get('/rentedroom/[{category_id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM rentedroom WHERE category_id=:category_id");
    $sth->bindParam("category_id", $args['category_id']);
    $sth->execute();
    $rentedroom = $sth->fetchAll();
    return $this->response->withJson($rentedroom);
    });
    
    $app->get('/rentedroom/select/1/[{category_id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM rentedroom WHERE category_id=:category_id and rentedroom_ptice < 3000" );
    $sth->bindParam("category_id", $args['category_id']);
    $sth->execute();
    $todos = $sth->fetchAll();
    return $this->response->withJson($todos);
    });

    $app->get('/rentedroom/select/2/[{category_id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM rentedroom WHERE category_id=:category_id and rentedroom_ptice BETWEEN 3000 AND 4000" );
    $sth->bindParam("category_id", $args['category_id']);
    $sth->execute();
    $todos = $sth->fetchAll();
    return $this->response->withJson($todos);
    });

    $app->get('/rentedroom/select/3/[{category_id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM rentedroom WHERE category_id=:category_id and rentedroom_ptice BETWEEN 4000 AND 5000" );
    $sth->bindParam("category_id", $args['category_id']);
    $sth->execute();
    $todos = $sth->fetchAll();
    return $this->response->withJson($todos);
    });

    $app->get('/rentedroom/select/4/[{category_id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM rentedroom WHERE category_id=:category_id and rentedroom_ptice > 5000" );
    $sth->bindParam("category_id", $args['category_id']);
    $sth->execute();
    $todos = $sth->fetchAll();
    return $this->response->withJson($todos);
    });

 
 
    // Search for todo with given search teram in their name
    $app->get('/todos/search/[{query}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM tasks WHERE UPPER(task) LIKE :query ORDER BY task");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
 
    // Add a new todo
    $app->post('/todo', function ($request, $response) {
        $input = $request->getParsedBody();
        $sql = "INSERT INTO tasks (task) VALUES (:task)";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("task", $input['task']);
        $sth->execute();
        $input['id'] = $this->db->lastInsertId();
        return $this->response->withJson($input);
    });
        
 
    // DELETE a todo with given id
    $app->delete('/todo/[{id}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("DELETE FROM tasks WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
 
    // Update todo with given id
    $app->put('/todo/[{id}]', function ($request, $response, $args) {
        $input = $request->getParsedBody();
        $sql = "UPDATE tasks SET task=:task WHERE id=:id";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("id", $args['id']);
        $sth->bindParam("task", $input['task']);
        $sth->execute();
        $input['id'] = $args['id'];
        return $this->response->withJson($input);
    });

    //get dorm
    $app->get('/ranted', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM dorm ");
       $sth->execute();
       $ranted = $sth->fetchAll();
       return $this->response->withJson($ranted);
   });

   //get apartment
   $app->get('/apart', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT dorm.dorm_id,dorm.dorm_name,dorm.address,dorm.price,dorm.sex_c,dorm.numphone,dorm.catagory,dorm.facilities,dorm.pic_ti,
    pic.picture_id,pic.picture_name1,pic.picture_name2,pic.picture_name3,catagory_ca.catagory,catagory_ca.catagory_name
    FROM dorm,pic,catagory_ca
    WHERE dorm.dorm_id = pic.dorm_id
    AND dorm.catagory = catagory_ca.catagory
    AND catagory_ca.catagory LIKE '02';
    ");
   $sth->execute();
   $apart = $sth->fetchAll();
   return $this->response->withJson($apart);
});

$app->get('/condo', function ($request, $response, $args) {
    $sth = $this->db->prepare("
    SELECT dorm.dorm_id,dorm.dorm_name,dorm.address,dorm.price,dorm.sex_c,dorm.numphone,dorm.catagory,dorm.facilities,dorm.pic_ti,
    pic.picture_id,pic.picture_name1,pic.picture_name2,pic.picture_name3,catagory_ca.catagory,catagory_ca.catagory_name
    FROM dorm,pic,catagory_ca
    WHERE dorm.dorm_id = pic.dorm_id
    AND dorm.catagory = catagory_ca.catagory
    AND catagory_ca.catagory LIKE '01';
    ");
   $sth->execute();
   $condo = $sth->fetchAll();
   return $this->response->withJson($condo);
});

$app->get('/manshion', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT dorm.dorm_id,dorm.dorm_name,dorm.address,dorm.price,dorm.sex_c,dorm.numphone,dorm.catagory,dorm.facilities,dorm.pic_ti,
    pic.picture_id,pic.picture_name1,pic.picture_name2,pic.picture_name3,catagory_ca.catagory,catagory_ca.catagory_name
    FROM dorm,pic,catagory_ca
    WHERE dorm.dorm_id = pic.dorm_id
    AND dorm.catagory = catagory_ca.catagory
    AND catagory_ca.catagory LIKE '03';
    ");
   $sth->execute();
   $manshion = $sth->fetchAll();
   return $this->response->withJson($manshion);
});

$app->get('/do', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT dorm.dorm_id,dorm.dorm_name,dorm.address,dorm.price,dorm.sex_c,dorm.numphone,dorm.catagory,dorm.facilities,dorm.pic_ti,
    pic.picture_id,pic.picture_name1,pic.picture_name2,pic.picture_name3,catagory_ca.catagory,catagory_ca.catagory_name
    FROM dorm,pic,catagory_ca
    WHERE dorm.dorm_id = pic.dorm_id
    AND dorm.catagory = catagory_ca.catagory
    AND catagory_ca.catagory LIKE '04';
    ");
   $sth->execute();
   $do = $sth->fetchAll();
   return $this->response->withJson($do);
});

$app->get('/detail/[{catagory_name}={dorm_id}]', function ($request, $response, $args) {
    $sqldata = $this->db->prepare("SELECT dorm.dorm_id,dorm.dorm_name,dorm.address,dorm.price,dorm.sex_c,
        dorm.numphone,dorm.facilities,catagory_ca.catagory_name
     FROM dorm,catagory_ca
        WHERE dorm.catagory = catagory_ca.catagory
        AND catagory_name =:catagory_name
        AND dorm.dorm_id =:dorm_id
    ");
    $sqldata->bindParam("catagory", $args['catagory']);
    $sqldata->bindParam("dorm_id", $args['dorm_id']);
   $sqldata->execute();
   $room = $sqldata->fetchAll();

    $sqlimg = $this->db->prepare("SELECT dorm.dorm_name,picture.picture_id,picture.picture_name
        FROM picture,dorm
        WHERE dorm.dorm_id = picture.dorm_id
        AND dorm.dorm_id =:drom_id
    ");
     $sqlimg->bindParam("dorm_id", $args['dorm_id']);
     $sqlimg->execute();
     $img = $sqlimg->fetchAll();
    $body= array('room'=>$room)+['img'=>$img];
   return $this->response->withJson($body);
});


$app->get('/search/[{query}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM dorm WHERE dorm_name LIKE :query ORDER BY dorm_name");
   $query = "%".$args['query']."%";
   $sth->bindParam("query", $query);
   $sth->execute();
   $todos = $sth->fetchAll();
   return $this->response->withJson($todos);
});


$app->get('/ren3', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT dorm.dorm_id,dorm.dorm_name,dorm.address,dorm.price,dorm.sex_c,dorm.numphone,dorm.catagory,dorm.facilities,dorm.pic_ti,
    pic.picture_id,pic.picture_name1,pic.picture_name2,pic.picture_name3,catagory_ca.catagory,catagory_ca.catagory_name
    FROM dorm,pic,catagory_ca
    WHERE dorm.dorm_id = pic.dorm_id
    AND dorm.catagory = catagory_ca.catagory
    AND dorm.price <3000;
    ");
   $sth->execute();
   $do = $sth->fetchAll();
   return $this->response->withJson($do);
});

$app->get('/ren34', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT dorm.dorm_id,dorm.dorm_name,dorm.address,dorm.price,dorm.sex_c,dorm.numphone,dorm.catagory,dorm.facilities,dorm.pic_ti,
    pic.picture_id,pic.picture_name1,pic.picture_name2,pic.picture_name3,catagory_ca.catagory,catagory_ca.catagory_name
    FROM dorm,pic,catagory_ca
    WHERE dorm.dorm_id = pic.dorm_id
    AND dorm.catagory = catagory_ca.catagory
    AND dorm.price BETWEEN 3000 AND 4000;
    ");
   $sth->execute();
   $do = $sth->fetchAll();
   return $this->response->withJson($do);
});

$app->get('/ren45', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT dorm.dorm_id,dorm.dorm_name,dorm.address,dorm.price,dorm.sex_c,dorm.numphone,dorm.catagory,dorm.facilities,dorm.pic_ti,
    pic.picture_id,pic.picture_name1,pic.picture_name2,pic.picture_name3,catagory_ca.catagory,catagory_ca.catagory_name
    FROM dorm,pic,catagory_ca
    WHERE dorm.dorm_id = pic.dorm_id
    AND dorm.catagory = catagory_ca.catagory
    AND dorm.price BETWEEN 4000 AND 5000;
    ");
   $sth->execute();
   $do = $sth->fetchAll();
   return $this->response->withJson($do);
});

$app->get('/ren5', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT dorm.dorm_id,dorm.dorm_name,dorm.address,dorm.price,dorm.sex_c,dorm.numphone,dorm.catagory,dorm.facilities,dorm.pic_ti,
    pic.picture_id,pic.picture_name1,pic.picture_name2,pic.picture_name3,catagory_ca.catagory,catagory_ca.catagory_name
    FROM dorm,pic,catagory_ca
    WHERE dorm.dorm_id = pic.dorm_id
    AND dorm.catagory = catagory_ca.catagory
    AND dorm.price >5000;
    ");
   $sth->execute();
   $do = $sth->fetchAll();
   return $this->response->withJson($do);
});

$app->get('/room/[{dorm_name}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT dorm.dorm_id,dorm.dorm_name,
    dorm.address,dorm.price,dorm.sex_c,
    dorm.numphone,
    dorm.facilities,
    catagory_ca.catagory_name
    FROM dorm,catagory_ca
    WHERE dorm.catagory = catagory_ca.catagory
    AND dorm_name =:dorm_name ");
    $sth->bindParam("dorm_name",$args['dorm_name']);
   $sth->execute();
   $room = $sth->fetchAll();
   return $this->response->withJson($room);
});


$app->get('/review/[{dorm_id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT review_detail FROM review,dorm 
    WHERE review.dorm_id = dorm.dorm_id ");
    $sth->bindParam("dorm_id",$args['dorm_id']);
   $sth->execute();
   $room = $sth->fetchAll();
   return $this->response->withJson($room);
});
}
