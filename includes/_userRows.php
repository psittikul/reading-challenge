<?php 
    var_dump($User->getLeaderboard());
    $query = "select name,
    userID,
    freeReads,
    promptBooks,
    freeReads + 2*promptBooks as bookCount,
    image_path,
    color
    from
        (select
        z.userID as userID,
        if(z.freeReads is null, 0, z.freeReads) as freeReads,
        if(z.promptBooks is null, 0, z.promptBooks) as promptBooks,
        z.name as name,
        z.image_path as image_path,
        z.color as color
        from
        (select y.userID as userID, y.freeReads as freeReads, x.promptBooks as promptBooks, y.name as name, y.image_path as image_path, y.color as color
        from
        (
            select users.id as userID, count(books.id) AS promptBooks
            from users left outer join books on users.id = books.user_id
            where books.prompt_id > 0 AND books.status = 'Read' group by users.id
        ) as x
        right outer join (
        select users.name, users.id as userID, image_path, color, count(books.id) as freeReads
        from users left outer join books on users.id = books.user_id
        where books.prompt_id is null AND books.status = 'Read' group by users.id
        ) as y on x.userID = y.userID) as z) as az
		UNION
        (select name,
        userID,
    freeReads,
    promptBooks,
    freeReads + 2*promptBooks as bookCount,
    image_path,
    color
    from
        (select
        z.userID as userID,
        if(z.freeReads is null, 0, z.freeReads) as freeReads,
        if(z.promptBooks is null, 0, z.promptBooks) as promptBooks,
        z.name as name,
        z.image_path as image_path,
        z.color as color
        from
        (select y.userID as userID, y.freeReads as freeReads, x.promptBooks as promptBooks, y.name as name, y.image_path as image_path, y.color as color
        from
        (
            select users.id as userID, count(books.id) AS promptBooks
            from users left outer join books on users.id = books.user_id
            where books.prompt_id > 0 AND books.status = 'Read' group by users.id
        ) as x
        left outer join (
        select users.name, users.id as userID, image_path, color, count(books.id) as freeReads
        from users left outer join books on users.id = books.user_id
        where books.prompt_id is null AND books.status = 'Read' group by users.id
        ) as y on x.userID = y.userID) as z) as aza)
    order by bookCount desc, name asc;";
    