import React from "react";
import OutboundPlacesCard from "./home/OutboundPlacesCard";

const OutboundPackages = ({ outboundPlace }) => {
  const returnedOutboundPlace = outboundPlace.map((item)=>(
    <div className="tour-card" key={item.id}>
      <OutboundPlacesCard tour={item}/>
    </div>
  ))
  return (
    <div className="outbound-packages-page">
      <img
        src="https://sealinkstravel.com/wp-content/uploads/2020/02/banner.jpg"
        alt="main-banner"
        className="main-banner"
      />
      <h1 className="heading">All Outbound Packages</h1>
      <div className="cards-wrapper container">{returnedOutboundPlace}</div>
    </div>
  );
};

export default OutboundPackages;

OutboundPackages.defaultProps = {
  outboundPlace: [
    {
      id: 0,
      imgUrl:
        "https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Indonesia",
    },
    {
      id: 1,
      imgUrl:
        "https://images.pexels.com/photos/162031/dubai-tower-arab-khalifa-162031.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Dubai",
    },
    {
      id: 2,
      imgUrl:
        "https://images.pexels.com/photos/4682328/pexels-photo-4682328.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Thailand",
    },
    {
      id: 3,
      imgUrl:
        "https://images.pexels.com/photos/699466/pexels-photo-699466.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Paris",
    },

    {
      id: 4,
      imgUrl:
        "https://images.pexels.com/photos/1320684/pexels-photo-1320684.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Maldives",
    },
    {
      id: 5,
      imgUrl:
        "https://images.pexels.com/photos/3204950/pexels-photo-3204950.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "China",
    },
    {
      id: 6,
      imgUrl:
        "https://images.pexels.com/photos/6580703/pexels-photo-6580703.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Brazil",
    },
    {
      id: 7,
      imgUrl:
        "https://images.pexels.com/photos/4456988/pexels-photo-4456988.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Amsterdam",
    },
    {
      id: 8,
      imgUrl:
        "https://images.pexels.com/photos/3617500/pexels-photo-3617500.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Iceland",
    },
    {
      id: 9,
      imgUrl:
        "https://images.pexels.com/photos/54079/dome-rome-saint-peter-basilica-54079.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Rome",
    },

    {
      id: 10,
      imgUrl:
        "https://images.pexels.com/photos/427679/pexels-photo-427679.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "London",
    },
    {
      id: 11,
      imgUrl:
        "https://images.pexels.com/photos/10829071/pexels-photo-10829071.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
      placeName: "Barcelona",
    },
  ],
  // outboundTourPackages: [
  //   {
  //     id: 0,
  //     category: "City Tour",
  //     title: "Barcelona",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/10829071/pexels-photo-10829071.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  //   {
  //     id: 1,
  //     category: "City Tour",
  //     title: "Dubai",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/162031/dubai-tower-arab-khalifa-162031.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  //   {
  //     id: 2,
  //     category: "City Tour",
  //     title: "Thailand",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/4682328/pexels-photo-4682328.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  //   {
  //     id: 3,
  //     category: "City Tour",
  //     title: "paris",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/699466/pexels-photo-699466.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },

  //   {
  //     id: 4,
  //     category: "City Tour",
  //     title: "Maldives",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/1320684/pexels-photo-1320684.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  //   {
  //     id: 5,
  //     category: "City Tour",
  //     title: "China",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/3204950/pexels-photo-3204950.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  //   {
  //     id: 6,
  //     category: "City Tour",
  //     title: "Brazil",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/6580703/pexels-photo-6580703.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  //   {
  //     id: 7,
  //     category: "City Tour",
  //     title: "Iceland",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/4456988/pexels-photo-4456988.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",

  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  //   {
  //     id: 8,
  //     category: "City Tour",
  //     title: "Iceland",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/3617500/pexels-photo-3617500.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  //   {
  //     id: 9,
  //     category: "City Tour",
  //     title: "Rome",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/54079/dome-rome-saint-peter-basilica-54079.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },

  //   {
  //     id: 10,
  //     category: "City Tour",
  //     title: "London",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/427679/pexels-photo-427679.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  //   {
  //     id: 11,
  //     category: "City Tour",
  //     title: "Barcelona",
  //     description:
  //       "Langtang valley is the most beautiful valley in Nepal. Most of the tourist are mesmerised by the beautiful scenic view of Langtang Mountain, Wildlife reserve. It is the place where you can see the snow capped mountains and beautiful glaciers. Langtang trek is a good option for short trek. Trekking, White water rafting, Climbing are some of the adventurous things which you can do while you are in Langtang tour.",
  //     image:
  //       "https://images.pexels.com/photos/10829071/pexels-photo-10829071.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  //     rating: {
  //       rate: 5,
  //       count: 120,
  //     },
  //     totalReviews: 120,
  //     price: 60000.0,
  //     feature: false,
  //   },
  // ],
};
