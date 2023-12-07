import Filter from "./Filter";
import Sort from "./Sort";

export default function Top() {

    return (
        <div className="top">
            <div className="top__title">Books market</div>
            <div className="top__buttons">
                <Filter />
                <Sort />
            </div>
            <div className="top__subtitle">Books list</div>
        </div>
    )
}