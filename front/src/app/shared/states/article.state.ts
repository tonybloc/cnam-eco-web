import { NgxsModule, Action, Selector, State, StateContext, UpdateState } from '@ngxs/store';
import { patch, removeItem, insertItem } from '@ngxs/store/operators';

import { AddArticleToCart, DeleteArticleFromCart, UpdateSelectedArticle, LoadArticles, DeleteAllArticleFromCart } from '../actions/article.action';
import { ArticleStateModel } from '../models/article.state.model';
import { ProductService } from '../../service/product.service';
import { Article } from '../../models/article';
import { Observable } from 'rxjs';

@State<ArticleStateModel>({
    name: "articles",
    defaults: {
        Cart: []
    }
})


export class ArticleState {

    /**
     * Get cart in store
     * @param state 
     */
    @Selector() static getCart(state: ArticleStateModel): Article[] {
        return state.Cart;
    }    

    /**
     * Add cart into store
     * @param param0 
     * @param param1 
     */
    @Action(AddArticleToCart) add({ getState, patchState }: StateContext<ArticleStateModel>, { item }: AddArticleToCart) {
        console.log(item);
        const state = getState();
        patchState({ Cart: [...state.Cart, item] });
    }

    /**
     * Delete article in store
     * @param ctx 
     * @param param1 
     */
    @Action(DeleteArticleFromCart) del(ctx: StateContext<ArticleStateModel>, { item }: DeleteArticleFromCart) {
        const state = ctx.setState(
            patch({
                Cart: removeItem<Article>(i => i.reference === item.reference)
            })
        );
    }

    @Action(DeleteAllArticleFromCart) delAll(state: ArticleStateModel): Article[] {
        state.Cart = [];
        return [];
    }

    /**
     * 
     * @param service Product service (backend api)
     */
    constructor(private service: ProductService) { }
}