import { useContext } from 'react';
import { BooksContext } from './BooksContext';
import Books from './Books';
import Top from './Top';
// import Important from './Important';

export default function Layout() {

    const { books } = useContext(BooksContext);

    return (
        <div className="layout">
            {/* <Important/> */}
            <Top/>
            {
            books === null 
            ? 
            <div className="loading">Now loading books...</div>
            :
            <Books/>

        }
            
        </div>
    )
}