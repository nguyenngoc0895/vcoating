<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'wp_vcoating' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '.t;d7}>Moh&l_w|.zkX;A/!s,o}q`+Z6U7?%bZ<tU<.aU3#0Pae`$3rP_!O~06Wv' );
define( 'SECURE_AUTH_KEY',  '5$lmA}MxLD^ko4fczn4o+bB33)zJ`H<n6zX&$KsgY_X9M@B eBk:Yx<^p~.z><9L' );
define( 'LOGGED_IN_KEY',    'duvB]6*hk6RWX/&&wt<e8b$eonZv6u<e2Nm#%@D1>(FXOcB[ZfNOpKA43P>JS PC' );
define( 'NONCE_KEY',        '$@#Mx/cxNRJu(;9|61,aMxJs.7}R:Z;2O}&zIFU)>d7nu XZ}~F[6eW@{[7[/wH(' );
define( 'AUTH_SALT',        '%ynTJ,e{ao;?bl+1NlcE}A|;DKDR?F4{|]92dHW.vS5W;/zW1m}8vUYl/oRFV4Mg' );
define( 'SECURE_AUTH_SALT', 'ImJW SK|#~8MhO)-jzzk}RtlDphaf1z$% !W#talkcSlf.BNe!qJ&|m2o<]-@]L,' );
define( 'LOGGED_IN_SALT',   'CzeT m 69+Y&K-b%unBsF#ii`~zdx1hLnPqEN6Es6mJ}vy.$*ko04NjeJ5f*B(y_' );
define( 'NONCE_SALT',       'k7Rw+p%@k[v$7)P7;*iF*&c2]Ci=gO]#_ZXWt_a7`?[ua5j!EB#:N1qfan|Rr[j)' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
