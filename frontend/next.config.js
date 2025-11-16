/** @type {import('next').NextConfig} */
const nextConfig = {
  images: {
    remotePatterns: [
      {
        protocol: 'http',
        hostname: 'localhost',
        port: '8000',
        pathname: '/storage/**',
      },
      {
        protocol: 'https',
        hostname: 'yourdomain.com',
        pathname: '/storage/**',
      },
      {
        protocol: 'https',
        hostname: 'img.youtube.com',
        pathname: '/vi/**',
      },
    ],
  },
  // API olmadan build yapabilmek için
  // Tüm sayfaları dynamic rendering'e zorla
  experimental: {
    isrMemoryCacheSize: 0,
  },
  // Veya export komutunu devre dışı bırak
  output: 'standalone',
}

module.exports = nextConfig