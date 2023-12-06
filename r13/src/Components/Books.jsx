import { useContext } from "react";



export default function Books() {

}
    <div className="books">
            {
                    Books.map(book => <Book key = {book.id} book = {book}/>)
            }
    </div>