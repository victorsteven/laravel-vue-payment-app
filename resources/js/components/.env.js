let API_ROUTE 

process.env.NODE_ENV == 'development'
  ? API_ROUTE = 'http://payment.test'
  : API_ROUTE = 'http://ec2-3-18-113-213.us-east-2.compute.amazonaws.com'

export default API_ROUTE