<?php
require_once 'models/Model.php';

class News extends Model
{
  const STATUS_ENABLED = 1;
  const STATUS_DISABLED = 0;

  /**
   * Lấy dữ liệu có phân trang
   * @param array $arrSearch Mảng các từ khóa search nếu có
   * @return array|null
   */
  public function getAll()
  {
    $connection = $this->openConnection();
    $querySelect = "SELECT news.*, admins.username as admin_username, categories.name as category_name FROM news
                    INNER JOIN admins ON admins.id = news.admin_id
                    INNER JOIN categories ON categories.id = news.category_id
                    ORDER BY news.created_at DESC
";
    $results = mysqli_query($connection, $querySelect);
    $news = [];
    if (mysqli_num_rows($results) > 0) {
      $news = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    $this->closeConnection($connection);

    return $news;
  }

    /**
     * Lấy dữ liệu có phân trang
     * @param array $arrSearch Mảng các từ khóa search nếu có
     * @return array|null
     */
    public function getAllPagination()
    {
        //do hiển thị theo cơ chế phân trang,
        //nên sẽ không lấy toàn bộ dữ liệu nữa
        // thay vào đó sẽ sử dung cơ chế limit (bản ghi bắt đầu lấy, lấy đến bản ghi nào)
        //ví dụ LIMIT (0, 5) lấy bản ghi ví trí đầu tiên đến ví trí thứ 4
        $connection = $this->openConnection();
        $querySelect = "SELECT news.*, admins.username as admin_username, categories.name as category_name FROM news
                    LEFT JOIN admins ON admins.id = news.admin_id
                    LEFT JOIN categories ON categories.id = news.category_id
                    {$this->querySearch}
                    ORDER BY news.created_at DESC
                    LIMIT {$this->startpoint}, {$this->per_page}
";
        $results = mysqli_query($connection, $querySelect);

        $news = [];
        if (mysqli_num_rows($results) > 0) {
            $news = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);

        return $news;
    }


  public function getById($id)
  {
    $connection = $this->openConnection();
    //do bảng news có các khóa ngoại nên cần join các bảng liên quan để lấy các thông tin cần thiết
    $querySelect = "
        SELECT news.*, categories.name as category_name, admins.username as admin_username FROM news
        LEFT JOIN categories ON categories.id = news.category_id
        LEFT JOIN admins ON admins.id = news.admin_id
        WHERE news.id = $id";

    $results = mysqli_query($connection, $querySelect);
    $news = [];
    if (mysqli_num_rows($results) == 1) {
      $news = mysqli_fetch_all($results,
        MYSQLI_ASSOC);
      $news = $news[0];
    }

    return $news;
  }

    /**
     * Lấy danh sách 5 tin tức được đọc nhiều nhất, tạm thời sẽ sử dụng lượt like làm mốc
     * @return array|null
     */
    public function getAllReadest()
    {
        $connection = $this->openConnection();
        $querySelect = "SELECT id, title, like_total, avatar, comment_total FROM news
                    ORDER BY like_total DESC
                    LIMIT 5
";
        $results = mysqli_query($connection, $querySelect);
        $news = [];
        if (mysqli_num_rows($results) > 0) {
            $news = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
        $this->closeConnection($connection);

        return $news;
    }

}