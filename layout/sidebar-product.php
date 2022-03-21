<div class="sidebar fl-left">
            <?php
                get_sidebar("cat-product");
            ?>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" class="radio" value-price="< 500000" name="r-price"></td>
                                    <td>Dưới 500.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-price="BETWEEN 500000 AND 1000000" name="r-price"></td>
                                    <td>500.000đ - 1.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-price="BETWEEN 1000000 AND 5000000" name="r-price"></td>
                                    <td>1.000.000đ - 5.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-price="BETWEEN 5000000 AND 10000000" name="r-price"></td>
                                    <td>5.000.000đ - 10.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-price="> 10000000" name="r-price"></td>
                                    <td>Trên 10.000.000đ</td>
                                </tr>
                                <input type="hidden" class="price">
                            </tbody>
                        </table>
                        
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Hãng</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" class="radio" value-brand="1" name="r-brand"></td>
                                    <td>iPhone</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-brand="2" name="r-brand"></td>
                                    <td>Samsung</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-brand="3" name="r-brand"></td>
                                    <td>Oppo</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-brand="4" name="r-brand"></td>
                                    <td>Xiaomi</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-brand="5" name="r-brand"></td>
                                    <td>Macbook</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-brand="6" name="r-brand"></td>
                                    <td>Asus</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-brand="7" name="r-brand"></td>
                                    <td>Acer</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="radio" value-brand="8" name="r-brand"></td>
                                    <td>Msi</td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Loại</td>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="" method="POST">
                                    <tr>
                                        <td><input type="radio" class="radio" value-type="1" name="type" value="mobile"></td>
                                        <td>Điện thoại</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" class="radio" value-type="2" name="type" value="laptop"></td>
                                        <td>Laptop</td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <?php
                get_sidebar("banner");
            ?>
        </div>