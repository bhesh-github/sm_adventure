import React from "react";
import { useState, useEffect } from "react";
import axios from "axios";
import TripCard from "../../allSmallComponents/TripCard";
import TopOutboundCountriesCard from "./OutboundPlacesCard";
import Testimonial2 from "../../allSmallComponents/Testimonial2";
import { TfiLocationPin } from "react-icons/tfi";
import LoadmoreBtn from "../../allSmallComponents/LoadmoreBtn";
import OurCompanies from "../../main/footers/OurCompanies";
import MultiCarousel from "../../allSmallComponents/MultiCarousel";
const Home = ({ trips, outboundTours }) => {
    const [searchInput, setSearchInput] = useState();
    const [homeBanner, setHomeBanner] = useState();

    const getHomeBanner = () => {
        axios
            .get("http://127.0.0.1:8000/api/banner")
            .then((res) => {
                const i = res.data.image;
                setHomeBanner(
                    `http://127.0.0.1:8000/upload/images/sliders/${i}`
                );
            })
            .catch((err) => console.log(err));
    };
    useEffect(() => {
        getHomeBanner();
    }, []);

    const handleSearchInputChange = (e) => {
        setSearchInput(e.target.value);
    };
    const topInboundTours = trips.map((item) => {
        const { id } = item;
        return (
            <div className="top-inbound-tours-card" key={id}>
                <TripCard trip={item} />
            </div>
        );
    });

    const outboundTourCard = outboundTours.map((item) => {
        const { id } = item;
        return <TopOutboundCountriesCard tour={item} key={id} />;
    });

    // const outboundTourCardApi = () => {
    //     axios
    //         .get("http://127.0.0.1:8000/api/top-outbound-tour")
    //         .then((res) => {
    //             console.log(res.data);
    //         })
    //         .catch((err) => console.log(err));
    // };
    // outboundTourCardApi();

    // const homeBanner = 'https://images.pexels.com/photos/1329510/pexels-photo-1329510.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'
    return (
        <>
            {/* <Header  /> */}
            <div className="home">
                <div
                    className="home-main-banner"
                    style={{
                        backgroundImage: `url(${homeBanner})`,
                    }}
                >
                    <span className="home-main-banner-overlay"></span>
                </div>
                <div className="long-searchbar-outer-wrapper">
                    <p className="long-searchbar-label">
                        Any Special Place in your mind ?
                    </p>
                    <div className="long-searchbar-wrapper">
                        <input
                            type="text"
                            value={searchInput}
                            className="long-searchbar-input"
                            onChange={(e) => {
                                handleSearchInputChange(e);
                            }}
                        />
                        <TfiLocationPin className="search-icon" />
                    </div>
                </div>
                <div className="top-inbound-tours-wrapper">
                    <span className="top-inbound-tours-heading">
                        Top Inbound Tours
                    </span>
                    <MultiCarousel topInboundTours={topInboundTours} />
                </div>
                <div className="section-2">
                    <div className="top-outbound-tour-cards-wrapper">
                        <span className="top-outbound-tours-cards-heading">
                            Top Outbound Places For Visit
                        </span>
                        <div className="top-outbound-tour-cards">
                            {outboundTourCard}
                        </div>
                        <LoadmoreBtn className="loadmore-btn" />
                    </div>
                    <Testimonial2 />
                </div>
                <OurCompanies />
            </div>
        </>
    );
};

export default Home;

Home.defaultProps = {
    trips: [
        {
            id: 0,
            category: "Adventure",
            title: "Langtang Trek",
            description:
                "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
            days: 14,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/him-compressor.jpg",
            rating: {
                rate: 5,
                count: 120,
            },
            totalReviews: 150,
            price: 50000.0,
            feature: true,
        },
        {
            id: 1,
            category: "City Tour",
            title: "Kathmandu And Pokhara Tour",
            description:
                "Kathmandu is the capital of the Country whereas Pokhara is the most beautiful city of Nepal. kathmandu is rich in art and culture, heritage, temples, etc and Pokhara is rich in natural beauties, Himalayas river and many more. Kathmandu and Pokhara tour will be the best tour for you where you can see the varieties of mixed culture and religion.",
            days: 10,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/ktmandpokharatour-compressor-768x576.jpg",
            rating: {
                rate: 4.9,
                count: 30,
            },
            totalReviews: 560,
            price: 30000.0,
            feature: true,
        },
        {
            id: 2,
            category: "Temple Visit",
            title: "Muktinath Darshan Tour",
            description:
                "Muktinath is a very sacred place both for Hindus and Buddhist too. Both Hindus and Buddhist visit Muktinath and worship here. It is located in Muktinath valley and the climate is very cold as chilling but the expression after Muktinath Darshan tour will worth more and you will forget all the obstacles of traveling. It is a pilgrimage where yearly people visit and explore its beauty.",
            days: 7,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/muktinathtour-768x576.jpg",
            rating: {
                rate: 3.9,
                count: 50,
            },
            totalReviews: 160,
            price: 10000.0,
            feature: true,
        },

        {
            id: 3,
            category: "Mountain Trekking",
            title: "The Best of Everest Base Camp Trek / Kalapathar Trekking",
            description:
                "Everest Base camp is one of the most trekked destinations among the other trekking routes in the Everest region. One of the world’s most challenging treks and to be able to be a part of the community of many daredevils who have ventured is a thrill in itself. This trek challenges one to push human limits and thriving adrenaline rushes to give you the once in a lifetime feeling of being at the roof of the world. One of the world’s most challenging treks is this and to be able to be a part of the community of many daredevils who have ventured is a thrill in itself. This Kalapathar trek challenges one to push human limits and thriving adrenaline rushes to give you the once in a lifetime feeling of being at the roof of the world.",
            days: 7,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/kalapathar-compressor-768x576.jpg",
            rating: {
                rate: 3.5,
                count: 50,
            },
            totalReviews: 660,
            price: 5000000.0,
            feature: true,
        },
        {
            id: 4,
            category: "Trekking",
            title: "Jungle Highlights",
            description:
                "Get the Jungle Highlights package and experience the best jungle safari in Chitwan. Overview Kathmandu is the capital of the Federal Democratic Republic of Nepal. It is the largest metropolis in Nepal, with a population of 1.5 million in the city proper and 3 million in its urban agglomeration across the Kathmandu Valley, which includes the towns of Lalitpur, Kirtipur, Madhyapur Thimi, Bhaktapur making the total population to roughly 5 million people and the municipalities across Kathmandu Valley. Kathmandu is also the largest metropolis in the Himalayan hill region.",
            days: 7,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/Jungle-3-768x576.jpg",
            rating: {
                rate: 5,
                count: 80,
            },
            totalReviews: 1060,
            price: 50000.0,
            feature: true,
        },
        {
            id: 5,
            category: "Trekking",
            title: "The Best of Everest Base Camp Trek / Kalapathar Trekking",
            description:
                "Ghorepani Poonhill Trekking is one of the most rewarding trekking in Nepal. This trek is popular among trekkers who have limited time in Nepal. Ghorepani Poonhill Trekking, also popularly known as Annapurna Sunrise Trekking, or Annapurna Panorama Trekking is one of the most popular and relatively easy treks that meander through the beautiful ethnic villages of Annapurna Region. Ghorepani Poonhill Trek is one of the most rewarding trekking in Nepal. This trekking is perfect for the ones who don’t have enough time for a week. Annapurna Poon hill trek also is known as panorama trekking.",
            days: 6,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/ghorepani-compressor-768x576.jpg",
            rating: {
                rate: 5,
                count: 500,
            },
            totalReviews: 1060,
            price: 3000000.0,
            feature: true,
        },
        {
            id: 6,
            category: "City Tour",
            title: "Beauty With Purpose Highlights",
            description:
                "Experience the natural beauties of amazing cities Kathmandu and Pokhara. Overview Kathmandu is the capital of the Federal Democratic Republic of Nepal. It is the largest metropolis in Nepal, with a population of 1.5 million in the city proper and 3 million in its urban agglomeration across the beauty of the Kathmandu Valley, which includes the towns of Lalitpur, Kirtipur, Madhyapur Thimi, Bhaktapur making the total population to roughly 5 million people and the municipalities across Kathmandu Valley. Kathmandu is also the largest metropolis in the Himalayan hill region.",
            days: 5,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/beauty-2-768x576.jpg",
            rating: {
                rate: 4.5,
                count: 59,
            },
            totalReviews: 100,
            price: 60000.0,
            feature: true,
        },
        {
            id: 7,
            category: "Trekking",
            title: "Annapurna Base Camp Trek",
            description:
                "The idea of Annapurna Base camp trek is one of the best option for those who wants to explore the beauty of Annapurna range. That amazing walk among rich mountains will complete a beautiful journey with lifetime experience. Annapurna Base camp trek is the best idea to trek. You will notably witness colorful prayer flags swaying in the crisp mountain wind. In addition, the Himalayan tapestry compliments the natural beauty of the Annapurna landscape quite spectacularly.",
            days: 11,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/annapurna-1-768x576.jpg",
            rating: {
                rate: 4.5,
                count: 59,
            },
            totalReviews: 100,
            price: 1000000.0,
            feature: true,
        },

        {
            id: 8,
            category: "Adventure",
            title: "Langtang Trek",
            description:
                "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
            totalDays: 14,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/him-compressor.jpg",
            rating: {
                rate: 5,
                count: 120,
            },
            totalReviews: 150,
            price: 50000.0,
            feature: true,
        },
        {
            id: 9,
            category: "City Tour",
            title: "Kathmandu And Pokhara Tour",
            description:
                "Kathmandu is the capital of the Country whereas Pokhara is the most beautiful city of Nepal. kathmandu is rich in art and culture, heritage, temples, etc and Pokhara is rich in natural beauties, Himalayas river and many more. Kathmandu and Pokhara tour will be the best tour for you where you can see the varieties of mixed culture and religion.",
            days: 10,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/ktmandpokharatour-compressor-768x576.jpg",
            rating: {
                rate: 4.9,
                count: 30,
            },
            totalReviews: 560,
            price: 30000.0,
            feature: true,
        },
        {
            id: 10,
            category: "Temple Visit",
            title: "Muktinath Darshan Tour",
            description:
                "Muktinath is a very sacred place both for Hindus and Buddhist too. Both Hindus and Buddhist visit Muktinath and worship here. It is located in Muktinath valley and the climate is very cold as chilling but the expression after Muktinath Darshan tour will worth more and you will forget all the obstacles of traveling. It is a pilgrimage where yearly people visit and explore its beauty.",
            days: 7,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/muktinathtour-768x576.jpg",
            rating: {
                rate: 3.9,
                count: 50,
            },
            totalReviews: 160,
            price: 10000.0,
            feature: true,
        },

        {
            id: 11,
            category: "Mountain Trekking",
            title: "The Best of Everest Base Camp Trek / Kalapathar Trekking",
            description:
                "Everest Base camp is one of the most trekked destinations among the other trekking routes in the Everest region. One of the world’s most challenging treks and to be able to be a part of the community of many daredevils who have ventured is a thrill in itself. This trek challenges one to push human limits and thriving adrenaline rushes to give you the once in a lifetime feeling of being at the roof of the world. One of the world’s most challenging treks is this and to be able to be a part of the community of many daredevils who have ventured is a thrill in itself. This Kalapathar trek challenges one to push human limits and thriving adrenaline rushes to give you the once in a lifetime feeling of being at the roof of the world.",
            days: 7,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/kalapathar-compressor-768x576.jpg",
            rating: {
                rate: 3.5,
                count: 50,
            },
            totalReviews: 660,
            price: 5000000.0,
            feature: true,
        },
        {
            id: 12,
            category: "Trekking",
            title: "Jungle Highlights",
            description:
                "Get the Jungle Highlights package and experience the best jungle safari in Chitwan. Overview Kathmandu is the capital of the Federal Democratic Republic of Nepal. It is the largest metropolis in Nepal, with a population of 1.5 million in the city proper and 3 million in its urban agglomeration across the Kathmandu Valley, which includes the towns of Lalitpur, Kirtipur, Madhyapur Thimi, Bhaktapur making the total population to roughly 5 million people and the municipalities across Kathmandu Valley. Kathmandu is also the largest metropolis in the Himalayan hill region.",
            days: 7,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/Jungle-3-768x576.jpg",
            rating: {
                rate: 5,
                count: 80,
            },
            totalReviews: 1060,
            price: 50000.0,
            feature: true,
        },
        {
            id: 13,
            category: "Trekking",
            title: "The Best of Everest Base Camp Trek / Kalapathar Trekking",
            description:
                "Ghorepani Poonhill Trekking is one of the most rewarding trekking in Nepal. This trek is popular among trekkers who have limited time in Nepal. Ghorepani Poonhill Trekking, also popularly known as Annapurna Sunrise Trekking, or Annapurna Panorama Trekking is one of the most popular and relatively easy treks that meander through the beautiful ethnic villages of Annapurna Region. Ghorepani Poonhill Trek is one of the most rewarding trekking in Nepal. This trekking is perfect for the ones who don’t have enough time for a week. Annapurna Poon hill trek also is known as panorama trekking.",
            days: 6,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/ghorepani-compressor-768x576.jpg",
            rating: {
                rate: 5,
                count: 500,
            },
            totalReviews: 1060,
            price: 3000000.0,
            feature: true,
        },
        {
            id: 14,
            category: "City Tour",
            title: "Beauty With Purpose Highlights",
            description:
                "Experience the natural beauties of amazing cities Kathmandu and Pokhara. Overview Kathmandu is the capital of the Federal Democratic Republic of Nepal. It is the largest metropolis in Nepal, with a population of 1.5 million in the city proper and 3 million in its urban agglomeration across the beauty of the Kathmandu Valley, which includes the towns of Lalitpur, Kirtipur, Madhyapur Thimi, Bhaktapur making the total population to roughly 5 million people and the municipalities across Kathmandu Valley. Kathmandu is also the largest metropolis in the Himalayan hill region.",
            days: 5,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/beauty-2-768x576.jpg",
            rating: {
                rate: 4.5,
                count: 59,
            },
            totalReviews: 100,
            price: 60000.0,
            feature: true,
        },
        {
            id: 15,
            category: "Trekking",
            title: "Annapurna Base Camp Trek",
            description:
                "The idea of Annapurna Base camp trek is one of the best option for those who wants to explore the beauty of Annapurna range. That amazing walk among rich mountains will complete a beautiful journey with lifetime experience. Annapurna Base camp trek is the best idea to trek. You will notably witness colorful prayer flags swaying in the crisp mountain wind. In addition, the Himalayan tapestry compliments the natural beauty of the Annapurna landscape quite spectacularly.",
            days: 11,
            image: "https://sealinkstravel.com/wp-content/uploads/2020/02/annapurna-1-768x576.jpg",
            rating: {
                rate: 4.5,
                count: 59,
            },
            totalReviews: 100,
            price: 1000000.0,
            feature: true,
        },
    ],
    slides: [
        {
            id: 0,
            img: "https://img.freepik.com/premium-photo/india-gate-canopy-beautiful-morning-panorama_400112-337.jpg?w=1380",
            text: "This summer 30% off for every couple.",
        },
        {
            id: 1,
            img: "https://img.freepik.com/free-photo/panoramic-view-tower-belem-lisbon-portugal_268835-1324.jpg?w=1380&t=st=1683802007~exp=1683802607~hmac=cc04f4d50b720e82c5e0fd7909bd632ac0b66598b4cf060df83dfec4cf88df7f",
            text: "20% off on every europe tour.",
        },
        {
            id: 2,
            img: "https://img.freepik.com/premium-photo/adventurous-man-standing-rocky-cave-mountain-nature-landscape-with-clouds-background_645882-7879.jpg?w=1380",
            text: "15% off on every inbound tour.",
        },
    ],
    outboundTours: [
        {
            id: 0,
            imgUrl: "https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Indonesia",
        },
        {
            id: 1,
            imgUrl: "https://images.pexels.com/photos/162031/dubai-tower-arab-khalifa-162031.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Dubai",
        },
        {
            id: 2,
            imgUrl: "https://images.pexels.com/photos/4682328/pexels-photo-4682328.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Thailand",
        },
        {
            id: 3,
            imgUrl: "https://images.pexels.com/photos/699466/pexels-photo-699466.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Paris",
        },

        {
            id: 4,
            imgUrl: "https://images.pexels.com/photos/1320684/pexels-photo-1320684.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Maldives",
        },
        {
            id: 5,
            imgUrl: "https://images.pexels.com/photos/3204950/pexels-photo-3204950.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "China",
        },
        {
            id: 6,
            imgUrl: "https://images.pexels.com/photos/6580703/pexels-photo-6580703.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Brazil",
        },
        {
            id: 7,
            imgUrl: "https://images.pexels.com/photos/4456988/pexels-photo-4456988.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Amsterdam",
        },
        {
            id: 8,
            imgUrl: "https://images.pexels.com/photos/3617500/pexels-photo-3617500.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Iceland",
        },
        {
            id: 9,
            imgUrl: "https://images.pexels.com/photos/54079/dome-rome-saint-peter-basilica-54079.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Rome",
        },

        {
            id: 10,
            imgUrl: "https://images.pexels.com/photos/427679/pexels-photo-427679.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "London",
        },
        {
            id: 11,
            imgUrl: "https://images.pexels.com/photos/10829071/pexels-photo-10829071.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
            placeName: "Barcelona",
        },
    ],
};
