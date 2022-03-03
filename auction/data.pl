use strict;

sub get_data {
  my $data = [
    {
      subject => 'お台場のガンダム・訳あり！',
      image   => '<IMG src="DSC00486.JPG">',
      from    => 'banzai',
      bidding_price => '15,500円',
      bidder  => '8',
      days    => '2日',
    },
    {
      subject => 'イタリアの自転車◆新品同様',
      image   => '<IMG src="DSC09057.JPG">',
      from    => 'jitensya',
      bidding_price => '50,000円',
      bidder  => '15',
      days    => '3時間',
    },
    {
      subject => 'アメリカのパソコン◆ジャンク品',
      image   => '<IMG src="DSC08954.JPG">',
      from    => 'pineapple',
      bidding_price => '3,000円',
      bidder  => '3人',
      days    => '4日',
    },



  ];

  $data->[2]->{body} = <<END_OF_BODY;
END_OF_BODY

  return $data;
}

1;
