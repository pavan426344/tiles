# Use an official Node.js runtime as a parent image
FROM node:18

# Set the working directory to /app
WORKDIR /app

# Copy package.json and package-lock.json to the working directory
COPY backend/package*.json ./

# Install any needed packages
RUN npm ci --production

# Copy the rest of the application code to the working directory
COPY backend/ .

# Make port 3000 available to the world outside this container
EXPOSE 3000

# Run the app when the container launches
CMD ["npm", "start"]
