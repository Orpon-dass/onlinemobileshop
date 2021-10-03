import React from "react";

export default function usePageBottom() {
  const [bottom, setbottom] = React.useState(false);

  React.useEffect(() => {
    function handleScroll() {
      const {scrollHeight,clientHeight,scrollTop,offsetHeight}=document.documentElement;
      const ScTopCliheight=Math.round(scrollTop+clientHeight);
      if(ScTopCliheight>=scrollHeight){
        setbottom(true);
      } 
    }
    window.addEventListener("scroll", handleScroll);
    return () => {
      window.removeEventListener("scroll", handleScroll);
    };
  });

  return bottom;
}