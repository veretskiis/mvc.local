<?php


class Pagination
{
    CONST PAGE_KEY  = 'p';

    protected $total;
    protected $page_size;
    public $current_page;

    
    protected $pages;
    protected $total_pages;
    protected $list_size = 5;

    /**
     * Pagination constructor.
     * @param $current_page
     * @param $page_size
     * @param $total
     */
    public function __construct($current_page, $page_size, $total)
    {
        $this->total = $total;
        $this->page_size = $page_size;
        $this->current_page = $current_page;
        
        $this->init();
    }

    /**
     * Рассчитывается количество страниц
     */
    public function init()
    {
        $this->total_pages = (int)ceil($this->total / $this->page_size);
        
    }

    /**
     * Возвращает ссылку на страницу пагинации
     * @param null|int $page
     * @return false|string
     */
    public function getHref($page = null)
    {
        if ($page === null) {
            $page = $this->current_page;
        }

        if ($page > 0 && $page <= $this->total_pages) {
            $uri = parse_url($_SERVER['REQUEST_URI']);
            $query = $uri['query'] ?? '';
            parse_str($query, $query_arr);

            $query_arr[self::PAGE_KEY] = $page;
            $query = http_build_query($query_arr);
            $uri = sprintf("%s?%s", $uri['path'], $query);

            return $uri;
        }

        return false;
    }

    /**
     * Возвращает массив ссылок пагинации
     * @return array
     */
    public function getListHref()
    {
        if ($this->pages === null) {
            $this->pages = [];
            for ($i = 0; $i < $this->total_pages; $i++) {
                $page = $this->getHref($i+1);
                if ($page) {
                    $this->pages[$i+1] = $page;
                }
            }
        }

        $half = ceil($this->list_size / 2) - 1;
        $start = $this->current_page - $half - 1;
        if ($this->total_pages - $start < $this->list_size) {
            $start = $this->total_pages - $this->list_size;
        }

        $new_array = array_slice($this->pages,
            $start >= 0 ? $start : 0,
            $this->list_size, true);

        if (count($new_array)) {
            if (! array_key_exists('1', $new_array)) {
                $new_array[1] = $this->getHref(1);
            }
            if (! array_key_exists($this->total_pages, $new_array)) {
                $new_array[$this->total_pages] = $this->getHref($this->total_pages);
            }
        }
        ksort($new_array);
        return $new_array;
    }
}