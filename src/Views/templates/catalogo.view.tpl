<div class="catalogo-container">
    <div class="catalogo-header">
        <h1>Catálogo de Productos</h1>
        <p>Explora nuestra colección completa de muebles de calidad</p>
    </div>

    {{if successMessage}}
    <div class="success-msg">{{successMessage}}</div>
    {{endif}}

    {{if productos}}
    <div class="productos-grid">
        {{foreach productos}}
        <div class="producto-card">

            <div class="producto-image">
                <img src="{{productImgUrl}}" alt="{{productName}}"
                     onerror="this.src='https://placehold.co/290x250?text=Imagen+no+disponible'">
            </div>

            <div class="producto-info">
                <h3>{{productName}}</h3>

                <p class="producto-desc">
                    {{productDescription}}
                </p>

                <div class="producto-price">
                    <span class="price">L {{productPrice}}</span>

                    {{if productStock}}
                        <span class="stock-badge">{{productStock}} disponible</span>
                    {{else}}
                        <span class="stock-badge agotado">Agotado</span>
                    {{endif}}
                </div>

                {{if productStock}}
                <form method="POST" action="index.php?page=Checkout_Checkout" class="form-add-cart">
                    <input type="hidden" name="accion" value="agregar">
                    <input type="hidden" name="id" value="{{productId}}">

                    <div class="qty-selector">
                        <label>Cantidad:</label>
                        <input type="number"
                               name="cantidad"
                               value="1"
                               min="1"
                               max="{{productStock}}"
                               class="qty-input"
                               required>
                    </div>

                    <button type="submit" class="btn-add-cart">
                        Agregar al Carrito
                    </button>
                </form>
                {{else}}
                    <button disabled class="btn-add-cart disabled">
                        No disponible
                    </button>
                {{endif}}

            </div>
        </div>
        {{endfor productos}}
    </div>
    {{else}}
        <div class="no-productos">
            <p>No hay productos disponibles.</p>
        </div>
    {{endif}}
</div>